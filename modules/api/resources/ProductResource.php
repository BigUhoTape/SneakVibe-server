<?php

namespace app\modules\api\resources;

use app\models\Product;
use app\models\ProductImage;

class ProductResource extends Product {

    public function fields()
    {
        return [
            'id',
            'article',
            'brand',
            'model',
            'price',
            'discountPrice',
            'gender',
            'description',
            'color',
            'productImages'
        ];
    }

    public function getProductImages()
    {
        return array_map(function (ProductImage $item) {
            return $item->url;
        }, parent::getProductImages()->all());
    }

}