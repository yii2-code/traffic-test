<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $type \app\types\WaybillType */

$this->title = 'Update Waybill: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Waybills', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $type->model->id, 'url' => ['view', 'id' => $type->model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="waybill-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'type' => $type,
    ]) ?>

</div>
