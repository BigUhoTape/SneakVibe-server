<?php

namespace app\modules\api\resources;

use app\models\Order;

class OrderResource extends Order {

    public function fields()
    {
        return [
            'id',
            'user_id',
            'status',
            'card_number',
            'created_at',
            'amount'
        ];
    }

    public function getAmount () {
        return $this->orderSum();
    }

}