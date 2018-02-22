<?php
/**
 * Created by PhpStorm.
 * User: cherem
 * Date: 22.02.18
 * Time: 10:10
 */

namespace app\widgets;


use app\services\WayBillService;
use app\types\WaybillType;
use yii\base\Widget;

/**
 * Class WaybillWidget
 * @package app\widgets
 */
class WaybillWidget extends Widget
{
    /**
     * @var WayBillService
     */
    private $wayBillService;

    /**
     * @var
     */
    public $type;
    /**
     * @var
     */
    public $message;

    public $model;
    /**
     * WaybillWidget constructor.
     * @param WayBillService $wayBillService
     * @param array $config
     */
    public function __construct(
        WayBillService $wayBillService,
        array $config = []
    )
    {
        $this->wayBillService = $wayBillService;
        parent::__construct($config);
    }

    public function init()
    {
        parent::init();

        if (is_null($this->type)) {
            $this->type = $this->wayBillService->createType($this->model);
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('form');
    }

    /**
     * @return array
     */
    public function getAction(): array
    {
        if (!is_null($this->model)) {
            return ['/waybill/update', 'id' => $this->model->id];
        }
        return ['/waybill/create'];
    }

    /**
     * @return WaybillType
     */
    public function getType(): WaybillType
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isMessage(): bool
    {
        return !is_null($this->message);
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
}