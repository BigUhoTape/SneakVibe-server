<?php

namespace app\modules\api\models;

use app\modules\api\resources\UserResource;

class UserForm extends UserResource {

    public function rules()
    {
        return [
            ['email', 'uniqueEmail'],
            ['email', 'email'],
            [['email', 'password_hash', 'name', 'last_name', 'gender'], 'required'],
            [['name', 'last_name', 'gender'], 'string'],
        ];
    }

    public function uniqueEmail ($attribute, $params) {
        $user = UserResource::findByEmail($this->$attribute);
        if ($user && $user->id != $this->id) {
            $this->addError($attribute, 'Email already exist!');
        }
    }

    public function load($data, $formName = null)
    {
        if (isset($data['password']) && $data['password']) {
            $this->password_hash = \Yii::$app->security->generatePasswordHash($data['password']);
            unset($data['password']);
        }
        return parent::load($data, $formName);
    }

}