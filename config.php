<?php
/**
 * Banner
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\banner\Events;
use humhub\modules\banner\Events;
use humhub\modules\banner\Module;
use humhub\components\View;

return [
    'id' => 'banner',
    'class' => Module::class,
    'namespace' => 'humhub\modules\banner',
    'events' => [
        [
            'class' => View::class,
            'event' => View::EVENT_BEGIN_BODY,
            'callback' => [Events::class, 'onViewBeginBody'],
        ],
    ],
];
