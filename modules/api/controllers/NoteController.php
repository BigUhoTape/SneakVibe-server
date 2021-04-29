<?php


namespace app\modules\api\controllers;

use app\modules\api\models\NoteForm;

class NoteController extends ActiveController {
    public $modelClass = NoteForm::class;
}