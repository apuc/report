<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 07.04.2017
 * Time: 23:58
 */

echo \yii\helpers\Html::label('Варианты','variations', ['class'=>'control-label']);
echo \yii\helpers\Html::textarea('variations',null, [
    'class'=>'form-control',
    'id'=>'variations',
    'placeholder' => 'key1=title1,key2=title2'
]);