<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\reports\models\Reports */
/* @var $cfv \common\models\db\CustomFieldValue */

$this->title = 'Редактировать отчет: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Отчеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="reports-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [
        'model' => $model,
        'cfv' => $cfv,
    ]) ?>

</div>
