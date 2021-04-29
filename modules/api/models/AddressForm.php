<?php

namespace app\modules\api\models;

use app\modules\api\resources\AddressResource;

class AddressForm extends AddressResource {

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['country', 'city', 'address', 'phone_number', 'postcode'], 'required'];
        return $rules;
    }

}