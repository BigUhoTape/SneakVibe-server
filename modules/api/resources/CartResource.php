<?php

namespace app\modules\api\resources;

use app\models\Cart;

class CartResource extends Cart {

    public function fields()
    {
        return [
            'id',
            'user_id',
            'product',
            'count'
        ];
    }

    public function getProduct () {
        return ProductResource::find()
            ->andOnCondition(['id' => $this->product_id])
            ->one();
    }

}