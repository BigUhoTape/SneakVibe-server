<?php


namespace app\modules\api\resources;


use app\models\Note;

class NoteResource extends Note {

    public function fields()
    {
        return [
            'id',
            'title',
            'body',
            'user_id',
        ];
    }

}