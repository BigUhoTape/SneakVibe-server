<?php

namespace app\models\query;


abstract class ActiveQuery extends \yii\db\ActiveQuery
{

    public function all($db = null)
    {
        return parent::all($db);
    }

    public function one($db = null)
    {
        return parent::one($db);
    }

    public function byUser ($id) {
        return $this->andWhere(['user_id' => $id]);
    }
}