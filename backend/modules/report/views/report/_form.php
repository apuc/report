<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\report\models\ReportType */
/* @var $form yii\widgets\ActiveForm */
/* @var $data array */
?>

<div class="report-type-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= Select2::widget([
        'name' => 'custom_fields[]',
        'value' => !$model->isNewRecord ? $model->getCurrentCustomFieldsIds() : '',
        'data' => $data,
        'options' => ['multiple' => true, 'placeholder' => 'Выбрать поля ...']
    ]); ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
