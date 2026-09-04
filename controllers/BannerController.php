<?php

/**
 * Banner
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\banner\controllers;

use humhub\components\access\ControllerAccess;
use humhub\components\Controller;
use humhub\modules\banner\Module;
use yii\web\Response;

class BannerController extends Controller
{
    /**
     * @inheritdoc
     */
    protected function getAccessRules()
    {
        return [
            [ControllerAccess::RULE_POST => ['close']],
        ];
    }

    /**
     * Hides the banner for the rest of the session
     */
    public function actionClose(): Response
    {
        /** @var Module $module */
        $module = $this->module;
        $module->closeInSession();

        return $this->asJson(['success' => true]);
    }
}
