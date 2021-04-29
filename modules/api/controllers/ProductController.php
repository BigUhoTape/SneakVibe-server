<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\ProductResource;
use yii\data\ActiveDataProvider;

class ProductController extends Controller {

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);
        return $behaviors;
    }

    public function actionIndex () {
        return new ActiveDataProvider([
            'query' => ProductResource::find(),
            'pagination' => [ 'pageSize' => 120 ]
        ]);
    }

}