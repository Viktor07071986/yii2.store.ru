<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\YiiAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="box-body">
                <div class="product-view">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            [
                                'attribute' => 'category_id',
                                'value' => '<a href="' . Url::to(['category/view', 'id' => $model->category->id]) . '">' . $model->category->title . '</a>',
                                'format' => 'raw',
                            ],
                            'title',
                            'content:raw',
                            'price',
                            'old_price',
                            'description',
                            'keywords',
                            [
                                'attribute' => 'img',
                                'value' => "/{$model->img}",
                                'format' => ['image', ['width' => '100']],
                            ],
                            'is_offer',
                            [
                                'attribute' => 'is_offer',
                                'value' => $model->is_offer ? '<span class="text-green">Да</span>' : '<span class="text-red">Нет</span>',
                                'format' => 'raw',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>