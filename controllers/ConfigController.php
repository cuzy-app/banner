<?php

/**
 * Banner
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\banner\controllers;

use humhub\modules\admin\components\Controller;
use humhub\modules\banner\models\Configuration;
use humhub\modules\banner\Module;
use Yii;

class ConfigController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        /** @var Module $module */
        $module = $this->module;
        $model = new Configuration(['settingsManager' => $module->settings]);
        $model->loadBySettings();

        $configurationWithEvent = $module->getConfiguration();
        $isActiveEvent
            = $configurationWithEvent->enabled !== $model->enabled
            || $configurationWithEvent->content !== $model->content;

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            $this->view->saved();
            $this->refresh();
        }

        return $this->render('index', [
            'model' => $model,
            'isActiveEvent' => $isActiveEvent,
        ]);
    }
}
