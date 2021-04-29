<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\FavoriteResource;

class FavoriteController extends ActiveController {

    public $modelClass = FavoriteResource::class;

}