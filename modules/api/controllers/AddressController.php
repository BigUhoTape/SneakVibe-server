<?php

namespace app\modules\api\controllers;

use app\models\Address;
use app\modules\api\models\AddressForm;

class AddressController extends ActiveController {

    public $modelClass = AddressForm::class;

    public function actions() {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate () {
        $address = new Address();
        $address->user_id = \Yii::$app->getUser()->getId();
        $address->save();
        return $address;
    }

}