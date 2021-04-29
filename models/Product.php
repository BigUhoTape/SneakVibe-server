<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property string $article
 * @property string $brand
 * @property string $model
 * @property int $price
 * @property int|null $discountPrice
 * @property string $gender
 * @property string|null $description
 * @property string $color
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property ProductImage[] $product_images
 */
class Product extends \app\models\ActiveRecord
{

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article', 'brand', 'model', 'price', 'gender', 'color'], 'required'],
            [['price', 'discountPrice'], 'default', 'value' => null],
            [['price', 'discountPrice'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['article', 'brand', 'model', 'gender', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'article' => Yii::t('app', 'Article'),
            'brand' => Yii::t('app', 'Brand'),
            'model' => Yii::t('app', 'Model'),
            'price' => Yii::t('app', 'Price'),
            'discountPrice' => Yii::t('app', 'Discount Price'),
            'gender' => Yii::t('app', 'Gender'),
            'description' => Yii::t('app', 'Description'),
            'color' => Yii::t('app', 'Color'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ProductQuery(get_called_class());
    }

    public function getGenders () {
        return [
            self::GENDER_FEMALE => 'Female',
            self::GENDER_MALE => 'Male'
        ];
    }

    public function getProductImages () {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }
}
