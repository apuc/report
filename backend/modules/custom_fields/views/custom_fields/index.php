<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\custom_fields\models\CustomFieldsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-fields-index">

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

            /*'id',*/
            'label',
            /*'slug',*/
            'type',
            /*'valid',*/
             [
                 'attribute' => 'is_main',
                 'value' => function($model){
                    return $model->is_main == 1 ? 'Основное' : 'Дополнительное';
                 }
             ],
            // 'default_value',
            // 'placeholder',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
