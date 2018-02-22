<?php
/**
 * Created by PhpStorm.
 * User: cherem
 * Date: 21.02.18
 * Time: 21:53
 */

namespace app\types;


use app\models\Waybill;
use yii\base\Model;

/**
 * Class WaybillType
 * @package app\types
 */
class WaybillType extends Model
{

    public $model;
    public $from;
    public $to;
    public $receiver;
    public $status;

    public function __construct(Waybill $model = null, array $config = [])
    {
        parent::__construct($config);
        if (is_null($model)) {
            $this->model = new Waybill();
        } else {
            $this->from = $model->from;
            $this->to = $model->to;
            $this->receiver = $model->receiver;
            $this->status = $model->status;
            $this->model = $model;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to', 'receiver'], 'trim'],
            [['from', 'to', 'receiver', 'status'], 'required'],
            [['status'], 'integer'],
            [['from', 'to', 'receiver'], 'string', 'max' => 250],
            [['from', 'to', 'receiver', 'status'], 'default', 'value' => null],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return $this->model->attributeLabels();
    }


}