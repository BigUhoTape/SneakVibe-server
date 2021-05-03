<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_card}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $card_number
 * @property string $cvc
 * @property string $name
 * @property string|null $expired_date
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $user
 */
class UserCard extends \app\models\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_card}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'card_number', 'cvc', 'name'], 'required'],
            [['user_id'], 'default', 'value' => null],
            [['user_id'], 'integer'],
            [['expired_date', 'created_at', 'updated_at'], 'safe'],
            [['card_number', 'cvc', 'name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'card_number' => Yii::t('app', 'Card Number'),
            'cvc' => Yii::t('app', 'Cvc'),
            'name' => Yii::t('app', 'Name'),
            'expired_date' => Yii::t('app', 'Expired Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\UserCardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\UserCardQuery(get_called_class());
    }
}
