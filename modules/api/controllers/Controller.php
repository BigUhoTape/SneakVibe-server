<?php

namespace app\modules\api\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller as BaseController;

abstract class Controller extends BaseController {

    public function actions()
    {
        $actions = parent::actions();
        $actions['options'] = [
            'class' =>   'yii\rest\OptionsAction'
        ];
        return $actions;
    }

    public function behaviors () {
        $behaviors = parent::behaviors();
        $auth = $behaviors['authenticator'];
        $auth['class'] = CompositeAuth::className();
        $auth['authMethods'] = [
            HttpBearerAuth::class
        ];
        unset($behaviors['authenticator']);
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className()
        ];
        $behaviors['authenticator'] = $auth;
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }

}