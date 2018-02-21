<?php

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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to', 'receiver', 'status'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['from', 'to', 'receiver'], 'string', 'max' => 250],
        ];
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
}
