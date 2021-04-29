<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Favorite]].
 *
 * @see \app\models\Favorite
 */
class FavoriteQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Favorite[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Favorite|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
