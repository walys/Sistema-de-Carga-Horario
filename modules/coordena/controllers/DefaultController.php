<?php

namespace app\modules\coordena\controllers;

use yii\web\Controller;

/**
 * Default controller for the `coordena` module
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
