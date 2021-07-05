<?php

//use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
<!--            <div class="box-header with-border">-->
<!--                --><?//= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
<!--            </div>-->
            <div class="box-body">
                <div class="order-index">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            [
                                'attribute' => 'created_at',
                                'format' => 'datetime',
                            ],
                            'updated_at:datetime',
                            'qty',
                            'total',
                            [
                                'attribute' => 'status',
                                'value' => function($data) {
                                    return $data->status ? '<span class="text-green">Завершен</span>' : '<span class="text-red">Новый</span>';
                                },
                                'format' => 'raw',
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Действия',
                                'template' => '{view} {update}'
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>