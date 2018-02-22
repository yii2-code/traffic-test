<?php
/**
 * Created by PhpStorm.
 * User: cherem
 * Date: 22.02.18
 * Time: 10:24
 */

/* @var $this yii\web\View */
/* @var $message yii\web\View */
/* @var $type \app\types\WaybillType */

use app\widgets\WaybillWidget;

?>

<?= WaybillWidget::widget(['type' => $type, 'message' => $message]) ?>
