<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\OrderResource;

class OrderController extends ActiveController {

    public $modelClass = OrderResource::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete']);
        unset($actions['update']);
        return $actions;
    }

}