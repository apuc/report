<?php

use common\models\db\CustomFields;
use common\models\db\ReportType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\reports\models\Reports */
/* @var $form yii\widgets\ActiveForm */
/* @var $mainFields CustomFields */
?>

<div class="reports-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'report_type_id')
        ->dropDownList(ArrayHelper::map(ReportType::find()->all(), 'id', 'title'), [
            'prompt' => 'Выберите тип отчета',
        ]) ?>

    <?php foreach ($mainFields as $field): ?>
        <?= $field->printField() ?>
    <?php endforeach; ?>
    <br>
    <span id="additionalFields"></span>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать',
            [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                'id' => 'sendReport'
            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
