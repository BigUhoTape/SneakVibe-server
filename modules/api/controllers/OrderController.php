<?php

namespace app\modules\api\controllers;

use app\modules\api\models\OrderForm;
use app\modules\api\resources\OrderResource;
use yii\data\ActiveDataProvider;

class OrderController extends ActiveController {

    public $modelClass = OrderForm::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['delete']);
        unset($actions['update']);
        return $actions;
    }

    public function actionIndex () {
        $query = OrderResource::find()
            ->andWhere(['user_id' => \Yii::$app->getUser()->getId()]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [ 'created_at' => SORT_DESC ]
            ],
            'pagination' => [
                'pageSize' => 2
            ]
        ]);

        return $dataProvider;
    }

}