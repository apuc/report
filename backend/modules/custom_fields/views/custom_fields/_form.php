<?php

use common\models\db\FieldVariations;
use common\models\db\Validate;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\custom_fields\models\CustomFields */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-fields-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'text' => 'Text', 'textarea' => 'Textarea', 'select' => 'Select', 'radio' => 'Radio', 'checkbox' => 'Checkbox', ], ['prompt' => 'Тип поля']) ?>

    <span id="variation-box">
        <?php if(!$model->isNewRecord && $model->isSelectable()): ?>
            <?= \yii\helpers\Html::label('Варианты','variations', ['class'=>'control-label']); ?>
            <?= \yii\helpers\Html::textarea('variations',
                $model->getVariationStr(),
                [
                'class'=>'form-control',
                'id'=>'variations',
                'placeholder' => 'key1=title1,key2=title2'
            ]); ?>
        <?php endif; ?>
    </span>

    <?= $form->field($model, 'pattern_id')
        ->dropDownList(ArrayHelper::map(Validate::find()->all(), 'id', 'name'), ['prompt'=>'Выбрать шаблон']) ?>

    <?= $form->field($model, 'valid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'error_msg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_main')->checkbox() ?>
    <?= $form->field($model, 'is_required')->checkbox() ?>

    <?= $form->field($model, 'default_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'placeholder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
