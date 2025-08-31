<?php
/**
 * Banner
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\banner;

use humhub\modules\banner\assets\BannerAssets;
use humhub\components\View;
use Yii;
use yii\base\Event;

class Events
{
    public static function onViewBeginBody(Event $event)
    {
        if (Yii::$app->request->isAjax) {
            return;
        }

        /** @var Module $module */
        $module = Yii::$app->getModule('banner');
        $configuration = $module->getConfiguration();

        if (!$configuration->enabled) {
            return;
        }

        $closeButton = $configuration->closeButton;
        $content = Yii::$app->user->isGuest ? $configuration->contentGuests : $configuration->content;
        if (empty($content)) {
            return;
        }

        /** @var View $view */
        $view = $event->sender;

        BannerAssets::register($view);

        echo Yii::$app->controller->renderPartial('@banner/views/banner/index', [
            'content' => $content,
            'closeButton' => $closeButton,
        ]);
    }
}
