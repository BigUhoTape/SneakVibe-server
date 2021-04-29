<?php

namespace app\modules\api\models;

use app\modules\api\resources\NoteResource;

class NoteForm extends NoteResource {

    public function init()
    {
        $this->user_id = \Yii::$app->getUser()->getId();
        parent::init();
    }

}