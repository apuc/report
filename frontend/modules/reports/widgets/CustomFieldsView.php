<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.04.2017
 * Time: 11:59
 */

namespace frontend\modules\reports\widgets;

use common\classes\Debug;
use common\models\db\CustomFieldValue;
use yii\base\Widget;

class CustomFieldsView extends Widget
{

    public $model;

    public function run()
    {
        $cfv = CustomFieldValue::find()
            ->where(['reports_id' => $this->model->id])
            ->with('customField')
            ->all();

        return $this->render('cfv', [
            'model' => $cfv
        ]);
    }

}