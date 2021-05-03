<?php

namespace app\modules\api\models;

use app\models\Order;
use app\models\OrderProduct;
use app\models\UserCard;
use app\modules\api\resources\CartResource;

class OrderForm extends Order {

    public $is_save_card;
    public $card_number;
    public $cvc;
    public $name;
    public $expired_date;


    public function rules()
    {
        return [
            ['is_save_card' => 'boolean'],
            [['user_id', 'card_number', 'cvc', 'name', 'expired_date'], 'required'],
            [['user_id'], 'integer'],
            [['card_number', 'cvc', 'name'], 'string'],
            ['created_at', 'safe']
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        if (!$this->validate()) {
            return false;
        }

        $user_id = \Yii::$app->getUser()->getId();

        $dbTransaction = \Yii::$app->db->beginTransaction();
        try {
            if ($this->is_save_card) {
                $user_card = UserCard::find()
                    ->andWhere(['user_id' => $user_id])
                    ->one();
                if (!$user_card) {
                    $user_card = new UserCard();
                }
                $user_card->user_id = $user_id;
                $user_card->card_number = $this->card_number;
                $user_card->cvc = $this->cvc;
                $user_card->name = $this->name;
                $user_card->expired_date = $this->expired_date;
            }

            $order = new Order();
            $order->user_id = $user_id;
            $order->card_number = $this->card_number;
            $order->status = Order::STATUS_ACTIVE;
            $order->save();

            $cart_products = CartResource::find()
                ->andWhere(['user_id' => $user_id])
                ->all();
            foreach ($cart_products as $cart_product) {
                $order_product = new OrderProduct();
                $order_product->order_id = $user_id;
                $order_product->product_id = $cart_product->product_id;
                $order_product->count = $cart_product->count;
                $order_product->save();
                $cart_product->delete();
            }

            $dbTransaction->commit();
        } catch (\Throwable $e) {
            $dbTransaction->rollBack();
            throw $e;
        }
    }

}