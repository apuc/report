<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\reports\models\Reports */
/* @var $mainFields \common\models\db\CustomFields */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Отчеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reports-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainFields' => $mainFields,
    ]) ?>

</div>
