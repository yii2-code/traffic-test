<?php

declare(strict_types=1);

namespace app\models;

use app\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "{{%waybill}}".
 *
 * @property int $id
 * @property string $from
 * @property string $to
 * @property string $receiver
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Waybill extends \yii\db\ActiveRecord
{
    /**
     *
     */
    const STATUS_WAIT = 0;
    /**
     *
     */
    const STATUS_DELIVERED = 1;
    /**
     *
     */
    const STATUS_WAY = 2;
    /**
     *
     */
    const STATUS_TAKE = 3;
    /**
     *
     */
    const STATUS_RETURN = 4;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%waybill}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'TimestampBehavior' => TimestampBehavior::class
        ];
    }

    /**
     * @param string $from
     * @param string $to
     * @param string $receiver
     * @return Waybill
     */
    public static function create(string $from, string $to, string $receiver, int $status): self
    {
        $model = new static();
        $model->edit($from, $to, $receiver, $status);
        return $model;
    }

    /**
     * @param string $from
     * @param string $to
     * @param string $receiver
     */
    public function edit(string $from, string $to, string $receiver, int $status): void
    {
        $this->from = $from;
        $this->to = $to;
        $this->receiver = $receiver;
        $this->status = $status;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'receiver' => 'Receiver',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return WaybillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WaybillQuery(get_called_class());
    }

    /**
     * @return array
     */
    public static function getStatusDropDown()
    {
        return [
            static::STATUS_WAIT => 'Ожидает отправки',
            static::STATUS_DELIVERED => 'Доставлено',
            static::STATUS_WAY => 'В пути',
            static::STATUS_TAKE => 'Принят на склад',
            static::STATUS_RETURN => 'Возвращен',
        ];
    }
}
