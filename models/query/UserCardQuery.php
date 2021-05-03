<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\UserCard]].
 *
 * @see \app\models\UserCard
 */
class UserCardQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\UserCard[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\UserCard|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
