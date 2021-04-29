<?php

namespace app\modules\admin\models;

use app\models\User;

class UserForm extends User {

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['status', 'in', 'range' => [
            self::STATUS_ACTIVE,
            self::STATUS_BLOCKED
        ]];
        return $rules;
    }

}