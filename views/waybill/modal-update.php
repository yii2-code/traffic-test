<?php
/**
 * Created by PhpStorm.
 * User: cherem
 * Date: 22.02.18
 * Time: 11:00
 */

/** @var $this \yii\web\View */

/** @var $model \app\models\Waybill */

use app\widgets\WaybillWidget;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

?>

<?php Modal::begin([
    'toggleButton' => [
        'label' => Html::icon('pencil'),
        'tag' => 'a',
    ]
]) ?>
<?php Pjax::begin([
    'enablePushState' => false,
]); ?>
<?= WaybillWidget::widget(['model' => $model]) ?>
<?php Pjax::end() ?>
<?php Modal::end() ?>
