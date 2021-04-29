<?php

namespace app\modules\api\controllers;

use app\modules\api\models\UserForm;

class UserController extends ActiveController {

    public $modelClass = UserForm::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex () {
        return \Yii::$app->getUser()->getIdentity();
    }
}