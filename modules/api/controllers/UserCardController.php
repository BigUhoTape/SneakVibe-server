<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\UserCardResource;

class UserCardController extends ActiveController {

    public $modelClass = UserCardResource::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['delete']);
        unset($actions['update']);
        return $actions;
    }

}