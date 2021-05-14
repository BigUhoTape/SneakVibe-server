<?php

namespace app\modules\api\controllers;

use yii\data\ActiveDataProvider;
use yii\rest\ActiveController as BaseActiveController;
use yii\filters\auth\HttpBearerAuth;

abstract class ActiveController extends BaseActiveController {
    public function actions()
    {
        $actions = parent::actions();
        $actions['options'] = [
          'class' =>   'yii\rest\OptionsAction'
        ];
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function behaviors () {
        $behaviors = parent::behaviors();
        $auth = $behaviors['authenticator'];
        $auth['authMethods'] = [
            HttpBearerAuth::class
        ];
        unset($behaviors['authenticator']);
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => null,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => ['*'],
            ]
        ];
        $behaviors['authenticator'] = $auth;
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }

    public function prepareDataProvider () {
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()
                ->byUser(\Yii::$app->user->id)
                ->orderBy(['id' => SORT_DESC])
        ]);
    }

}