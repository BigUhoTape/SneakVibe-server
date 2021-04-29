<?php

namespace app\modules\api\resources;

use app\models\Address;

class AddressResource extends Address {

    public function fields()
    {
        return [
            'id',
            'user_id',
            'country',
            'city',
            'address',
            'phone_number',
            'postcode'
        ];
    }

}