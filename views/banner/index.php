<?php
/**
 * Banner
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

/**
 * @var $view View
 * @var $content string
 * @var $closeButton bool
 */

use humhub\components\View;
use yii\helpers\Url;

?>

<div id="banner">
    <?php if ($closeButton): ?>
        <button id="banner-close" type="button"
                data-action-click="banner.close"
                data-action-url="<?= Url::to(['/banner/banner/close']) ?>">×</button>
    <?php endif; ?>
    <div id="banner-container">
        <div id="banner-content">
            <?= $content ?>
        </div>
    </div>
</div>
