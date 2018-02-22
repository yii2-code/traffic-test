<?php
/**
 * Created by PhpStorm.
 * User: cherem
 * Date: 21.02.18
 * Time: 22:24
 */

declare(strict_types=1);

namespace app\models;

/**
 * Class WaybillRepository
 * @package app\models
 */
class WaybillRepository
{
    /**
     * @param int $id
     * @return Waybill|null
     */
    public function findOne(int $id): ?Waybill
    {
        static $cache = [];
        if (!isset($cache[$id])) {
            $cache[$id] = Waybill::findOne($id);
        }
        return $cache[$id];
    }
}