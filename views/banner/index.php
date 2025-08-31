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
use humhub\helpers\Html;

?>

<div id="banner">
    <?php if ($closeButton): ?>
        <button id="banner-close" type="button">×</button>
    <?php endif; ?>
    <div id="banner-container">
        <div id="banner-content">
            <?= $content ?>
        </div>
    </div>
</div>

<script <?= Html::nonce() ?>>
    $(function () {
        <?php if ($closeButton): ?>
        $('#banner-close').on('click', function () {
            $('#banner').hide();
            $(':root').css('--hh-banner-height', '0px');
        });
        <?php endif; ?>
    });
</script>
