<?php

use app\widgets\WaybillWidget;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WaybillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Waybills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waybill-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'from',
            'to',
            'receiver',
            'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
