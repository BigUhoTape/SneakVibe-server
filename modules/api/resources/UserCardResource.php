<?php

namespace app\modules\api\resources;

use app\models\UserCard;

class UserCardResource extends UserCard {

    public function fields()
    {
        return [
            'id',
            'user_id',
            'card_number',
            'cvc',
            'name',
            'expired_date'
        ];
    }

}