<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Address]].
 *
 * @see \app\models\Address
 */
class AddressQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Address[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Address|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
