<?php

namespace app\modules\admin\models;

use app\models\Product;
use app\models\ProductImage;
use yii\validators\RequiredValidator;
use yii\validators\StringValidator;

class ProductForm extends Product {

    public $images;

    public function afterFind()
    {
        $this->images = array_map(function ($image) {
            return $image->url;
        }, $this->getProductImages()->all());
        parent::afterFind();
    }

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['images', 'validateImagesRequired'];
        return $rules;
    }

    public function validateImagesRequired ($attribute_name, $params) {
        $images = $this->$attribute_name;

        if (!is_array($images)) {
            $images = [];
        }

        foreach ($images as $index => $item) {
            $validator = new RequiredValidator();
            $error = null;
            $validator->validate($item, $error);
            if (!empty($error)) {
                $key = $attribute_name . '[' . $index . ']';
                $this->addError($key, $error);
            }
        }
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        if (!$this->validate()) {
            return false;
        }

        $dbTransaction = \Yii::$app->db->beginTransaction();
        try {

            parent::save($runValidation, $attributeNames);
            $allProductImages = array_map(function ($item) {
                return $item->url;
            }, ProductImage::find()->andWhere(['product_id' => $this->id])->all());
            $productToDelete = array_diff($allProductImages, $this->images);
            foreach ($productToDelete as $item) {
                $product = ProductImage::find()
                    ->andWhere(['product_id' => $this->id])
                    ->andWhere(['url' => $item])
                    ->one();
                $product->delete();
            }
            $productsToSave = array_diff($this->images, $allProductImages);
            foreach ($productsToSave as $item) {
                $product = new ProductImage();
                $product->product_id = $this->id;
                $product->url = $item;
                $product->save();
            }

            $dbTransaction->commit();
            return true;
        } catch (\Throwable $e) {
            $dbTransaction->rollBack();
            throw $e;
        }
    }

}