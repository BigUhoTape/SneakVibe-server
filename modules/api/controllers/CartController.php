<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\CartResource;

class CartController extends ActiveController {

    public $modelClass = CartResource::class;

}