<?php
/**
 * Created by PhpStorm.
 * User: cherem
 * Date: 21.02.18
 * Time: 22:01
 */

namespace app\services;


use app\models\Waybill;
use app\models\WaybillRepository;
use app\types\WaybillType;
use Yii;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * Class WayBillService
 * @package app\services
 */
class WayBillService
{
    /**
     * @var WaybillRepository
     */
    private $waybillRepository;


    /**
     * WayBillService constructor.
     * @param WaybillRepository $waybillRepository
     */
    public function __construct(
        WaybillRepository $waybillRepository
    )
    {
        $this->waybillRepository = $waybillRepository;
    }

    /**
     * @param Waybill|null $model
     * @return WaybillType
     */
    public function createType(Waybill $model = null): WaybillType
    {
        return new WaybillType($model);
    }

    /**
     * @param WaybillType $type
     * @return Waybill
     */
    public function create(WaybillType $type): Waybill
    {
        $model = Waybill::create($type->from, $type->to, $type->receiver, $type->status);
        $this->save($model);
        return $model;
    }

    /**
     * @param int $id
     * @param WaybillType $type
     * @return Waybill
     */
    public function update(int $id, WaybillType $type): Waybill
    {
        $model = $this->waybillRepository->findOne($id);
        $this->httpNotFoundException($model);
        $model->edit($type->from, $type->to, $type->receiver, $type->status);
        $this->save($model);
        return $model;
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $model = $this->waybillRepository->findOne($id);
        $this->httpNotFoundException($model);
        $this->remove($model);
    }

    /**
     * @param array $ids
     */
    public function deletes(array $ids)
    {
        $models = Waybill::find()->andWhere(['IN', 'id', $ids])->all();

        foreach ($models as $model) {
            $this->remove($model);
        }
    }

    /**
     * @param ActiveRecord|null $model
     * @throws NotFoundHttpException
     */
    public function httpNotFoundException(ActiveRecord $model = null): void
    {
        if (is_null($model)) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found'));
        }
    }

    /**
     * @param ActiveRecord $model
     */
    private function save(ActiveRecord $model): void
    {
        if (!$model->save()) {
            Yii::warning('Unable to save model');
        }
    }


    /**
     * @param ActiveRecord $model
     */
    private function remove(ActiveRecord $model)
    {
        if (!$model->delete()) {
            Yii::warning('Unable to delete model');
        }
    }

}