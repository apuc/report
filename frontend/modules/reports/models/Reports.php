<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 08.04.2017
 * Time: 14:16
 */

namespace frontend\modules\reports\models;

use yii\db\ActiveRecord;

class Reports extends \common\models\db\Reports
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
        ];
    }
}