<?php

namespace app\models;

/**
 * Class User
 * @package app\models
 *
 * @property integer $id
 * @property string $email
 * @property string $password_hash
 * @property string $access_token
 * @property string $name
 * @property string $last_name
 * @property string $gender
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Address $address
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    const GENDER_MAIL = 'male';
    const GENDER_FEMALE = 'female';

    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->andWhere(['access_token' => $token])->one();
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail(string $email)
    {
        return self::find()->andWhere(['email' => $email])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function getStatus () {
        return [
            self::STATUS_BLOCKED => 'Blocked',
            self::STATUS_ACTIVE => 'Active'
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\UserQuery(get_called_class());
    }

    public function getAddress () {
        return $this->hasOne(Address::className(), ['user_id' => 'id']);
    }
}
