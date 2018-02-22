<?php

use app\models\Waybill;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/** @var $context \app\widgets\WaybillWidget */


$context = $this->context;
?>

<?php if ($context->isMessage()): ?>
    <?php Alert::begin([
        'options' => [
            'class' => 'alert-warning',
        ],
    ]); ?>
    <?= $context->getMessage(); ?>
    <?php Alert::end() ?>
    <?php endif; ?>
<div class="waybill-form">

    <?php $form = ActiveForm::begin(['action' => $context->getAction(), 'options' => ['data-pjax' => 1]]); ?>

    <?= $form->field($context->getType(), 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($context->getType(), 'to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($context->getType(), 'receiver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($context->getType(), 'status')->dropDownList(Waybill::getStatusDropDown()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
