<?php

use app\models\Waybill;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $type \app\types\WaybillType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="waybill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($type, 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($type, 'to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($type, 'receiver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($type, 'status')->dropDownList(Waybill::getStatusDropDown()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
