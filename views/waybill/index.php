<?php

use app\models\Waybill;
use app\widgets\WaybillWidget;
use yii\bootstrap\Modal;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WaybillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Waybills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waybill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?php Modal::begin([
            'toggleButton' => [
                'label' => 'Create Waybill',
                'tag' => 'a',
                'class' => 'btn btn-success',
            ]
        ]) ?>
        <?php Pjax::begin([
            'enablePushState' => false,
        ]); ?>
        <?= WaybillWidget::widget() ?>
        <?php Pjax::end() ?>
        <?php Modal::end() ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::class],
            [
                'label' => '',
                'value' => function (Waybill $model) {
                    return Html::checkbox('ids[]', false, ['value' => $model->id, 'form' => 'action']);
                },
                'format' => 'raw'
            ],
            'id',
            'from',
            'to',
            'receiver',
            [
                'attribute' => 'status',
                'filter' => Waybill::getStatusDropDown(),
                'value' => function (Waybill $model) {
                    return $model->getStatus();
                }
            ],
            [
                'class' => ActionColumn::class,
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Yii::$app->view->render('//waybill/modal-update', ['model' => $model]);
                    }
                ]
            ],
        ],
    ]); ?>
    <form action="" id="action" method="post" onsubmit="this.action = $(this.url).val()">
        <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
        <div class="col-md-3">
            <div class="input-group">
                <?= Html::dropDownList('url', [], [
                    Url::to(['deletes'], true) => 'Delete'
                ], ['class' => 'form-control']); ?>
                <span class="input-group-btn">
                    <?= Html::submitButton('Пременить', ['class' => 'btn btn-default']) ?>
                </span>
            </div>
        </div>
    </form>
</div>

<?php
