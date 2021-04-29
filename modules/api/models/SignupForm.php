<?php

namespace app\modules\api\models;

use app\models\User;
use app\modules\api\resources\UserResource;
use yii\base\Model;

class SignupForm extends Model {
    public $email;
    public $password;
    public $password_repeat;
    public $name;
    public $last_name;
    public $gender;

    public $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['email', 'unique',
                'targetClass' => '\app\modules\api\resources\UserResource',
                'message' => 'This email has been already taken'
            ],
            ['email', 'email'],
            [['email', 'password', 'password_repeat', 'name', 'last_name', 'gender'], 'required'],
            [['name', 'last_name', 'gender'], 'string'],
            ['password', 'compare', 'compareAttribute' => 'password_repeat']
        ];
    }

    public function register()
    {
        $this->_user = new UserResource();
        if ($this->validate()) {
            $this->_user->email = $this->email;
            $this->_user->name = $this->name;
            $this->_user->last_name = $this->last_name;
            $this->_user->gender = $this->gender;
            $this->_user->status = User::STATUS_ACTIVE;
            $this->_user->password_hash = \Yii::$app->security->generatePasswordHash($this->password);
            $this->_user->access_token = \Yii::$app->security->generateRandomString(255);
            if ($this->_user->save()) {
                return true;
            }
            return false;
        }
        return false;
    }
}