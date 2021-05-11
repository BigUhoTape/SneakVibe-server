<?php

namespace app\modules\api\controllers;

use app\modules\api\models\OrderForm;

class OrderController extends ActiveController {

    public $modelClass = OrderForm::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete']);
        unset($actions['update']);
        return $actions;
    }

}