<?php
/* @var $dataProvider */
/* @var $filterModel */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

Yii::$app->formatter->nullDisplay = "";
Pjax::begin(['id'=>'ssid-pjax', 'enablePushState' => false, ]);

?>

<?= GridView::widget([
    'id'=>'ssid-table', //it is necessary for pjax
    'tableOptions' => ['class' => 'table table-hover table-striped text-center'],
    'dataProvider' => $dataProvider,
    'filterModel' => $filterModel,
    'options'=>['style'=>"color:#000; background-color:#eee;"],
    'summary'=>'',
    'emptyText' => "رکوردی یافت نشد",
    'columns' => [

        [
            'label' => 'نام',
            'attribute' => 'name',
            'headerOptions' => ['class' => 'text-center'],
            'contentOptions' => ['class' => 'text-center', 'style' => "vertical-align: middle;"],
        ],

        [
            'label' => 'اختصار',
            'attribute' => 'abbr',
            'headerOptions' => ['class' => 'text-center'],
            'contentOptions' => ['class' => 'text-center', 'style' => "vertical-align: middle;"],
        ],

        [
            'label' => 'نام مرکز',
            'attribute' => 'center_abbr',
            'headerOptions' => ['class' => 'text-center'],
            'contentOptions' => ['class' => 'text-center', 'style' => "vertical-align: middle;"],
        ],

        [
            'label'=>"آدرس",
            'attribute' => 'address',
            'headerOptions' => ['class' => 'text-center'],
            'contentOptions' => ['class' => 'text-center', 'style' => "vertical-align: middle;"],
        ],
    ]]);
Pjax::end();
?>

