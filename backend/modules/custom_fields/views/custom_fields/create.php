<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\custom_fields\models\CustomFields */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Поля', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
