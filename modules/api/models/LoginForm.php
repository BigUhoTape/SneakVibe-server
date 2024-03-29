<?php

namespace app\modules\api\models;

use app\modules\api\resources\UserResource;
use Yii;
use app\models\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class LoginForm extends \app\models\LoginForm {
    /**
     * Finds user by [[email]]
     *
     * @return UserResource|null
     */
    public function getUser () {
        if ($this->_user === false) {
            $this->_user = UserResource::findByEmail($this->email);
        }

        return $this->_user;
    }
}
