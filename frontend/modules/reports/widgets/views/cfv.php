<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.04.2017
 * Time: 12:04
 * @var $model \common\models\db\CustomFieldValue
 */
?>

<table class="table table-bordered">
    <tr>
        <th>Поле</th>
        <th>Значение</th>
    </tr>
    <?php foreach ($model as $item): ?>
        <tr>
            <td><?= $item->customField->label ?></td>
            <td><?= $item->getValue() ?></td>
        </tr>
    <?php endforeach; ?>
</table>
