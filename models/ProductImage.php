<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product_image}}".
 *
 * @property int $id
 * @property int $product_id
 * @property string $url
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Product $product
 */
class ProductImage extends \app\models\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product_image}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'url'], 'required'],
            [['product_id'], 'default', 'value' => null],
            [['product_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['url'], 'string', 'max' => 1024],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'url' => Yii::t('app', 'Url'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ProductQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\ProductImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ProductImageQuery(get_called_class());
    }
}
