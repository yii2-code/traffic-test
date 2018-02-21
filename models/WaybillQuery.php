<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Waybill]].
 *
 * @see Waybill
 */
class WaybillQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Waybill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Waybill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
