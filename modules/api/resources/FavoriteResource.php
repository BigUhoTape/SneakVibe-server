<?php

namespace app\modules\api\resources;

use app\models\Favorite;

class FavoriteResource extends Favorite {

    public function fields()
    {
        return [
            'id',
            'user_id',
            'product'
        ];
    }

    public function getProduct () {
        return ProductResource::find()
            ->andWhere(['id' => $this->product_id])
            ->one();
    }

}