<?php

use common\models\db\ReportType;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\reports\models\Reports */

$this->title = ReportType::findOne($model->report_type_id)->title . ' №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Отчеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reports-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'report_type_id',
                'value' => function($model){
                    return ReportType::findOne($model->report_type_id)->title;
                }
            ],
            [
                'attribute' => 'dt_add',
                'value' => function ($model) {
                    return date('H:i d-m-Y', $model->dt_add);
                },
            ],
            [
                'attribute' => 'dt_update',
                'value' => function ($model) {
                    return date('H:i d-m-Y', $model->dt_update);
                },
            ],
        ],
    ]) ?>

    <?= \frontend\modules\reports\widgets\CustomFieldsView::widget(['model' => $model]) ?>

</div>
