<?php

use common\models\db\CustomFields;
use common\models\db\ReportType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\reports\models\Reports */
/* @var $form yii\widgets\ActiveForm */
/* @var $cfv \common\models\db\CustomFieldValue */
?>

<div class="reports-form">

    <?php $form = ActiveForm::begin(); ?>
    <div style="display: none">
        <?= $form->field($model, 'report_type_id')
            ->dropDownList(ArrayHelper::map(ReportType::find()->all(),'id', 'title'),[
                'prompt' => 'Выберите тип отчета',
            ]) ?>
    </div>


    <?php foreach ($cfv as $item): ?>
        <?= $item->customField->printField($item->cf_value) ?>
    <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать',
            [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                'id' => 'sendReport'
            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>