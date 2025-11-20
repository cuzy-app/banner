<?php

/**
 * Banner
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\banner\assets;

use humhub\components\assets\AssetBundle;

class BannerAssets extends AssetBundle
{
    public $sourcePath = '@banner/resources';

    public $css = [
        'css/humhub.banner.css',
    ];

    public $js = [
        'js/humhub.banner.js',
    ];
}
