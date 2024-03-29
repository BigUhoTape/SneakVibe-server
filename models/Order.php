<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $status
 * @property string $card_number
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $user
 * @property OrderProduct $products
 */
class Order extends \app\models\ActiveRecord
{

    const STATUS_ACTIVE = 'active';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELED = 'canceled';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'card_number'], 'required'],
            [['user_id'], 'default', 'value' => null],
            [['user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'card_number'], 'string', 'max' => 255],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
            'card_number' => Yii::t('app', 'Card Number'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProducts () {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\OrderQuery(get_called_class());
    }

    public function orderSum () {
        $order_products = OrderProduct::find()
            ->andWhere(['order_id' => $this->id])
            ->all();
        $sum = 0;
        foreach ($order_products as $order_product) {
            if ($order_product->product->discountPrice) {
                $sum += $order_product->count * $order_product->product->discountPrice;
            } else {
                $sum += $order_product->count * $order_product->product->price;
            }
        }
        return $sum;
    }

    public function getStatus () {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_CANCELED => 'Canceled',
            self::STATUS_DELIVERED => 'Delivered'
        ];
    }
}
