<?php

use common\models\db\ReportType;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\reports\models\ReportsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reports-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'report_type_id',
                'value' => function($model){
                    return ReportType::findOne($model->report_type_id)->title;
                }
            ],
            [
                'attribute' => 'dt_add',
                'value' => function($model){
                    return date('H:i d-m-Y', $model->dt_add);
                }
            ],
            [
                'attribute' => 'dt_update',
                'value' => function($model){
                    return date('H:i d-m-Y', $model->dt_update);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
