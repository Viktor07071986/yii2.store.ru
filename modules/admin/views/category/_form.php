<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MenuWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="category-form">
    <?php $form = ActiveForm::begin(); ?>
    <?//= $form->field($model, 'parent_id')->textInput() ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <div class="form-group field-category-parent_id has-success">
        <label class="control-label" for="category-parent_id">Родительская категория</label>
        <select id="category-parent_id" class="form-control" name="Category[parent_id]">
            <option value="0">Самостоятельная категория</option>
            <?= MenuWidget::widget([
                'tpl' => 'select_category',
                'model' => $model,
                'cache_time' => 0,
            ]) ?>
        </select>
    </div>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>