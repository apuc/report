<?php

namespace backend\modules\custom_fields\controllers;

use yii\web\Controller;

/**
 * Default controller for the `custom_fields` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
