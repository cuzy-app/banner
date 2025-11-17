<?php
/**
 * Banner
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\banner;

use humhub\components\Event;
use humhub\modules\banner\models\Configuration;
use Yii;
use yii\helpers\Url;

/**
 *
 * @property-read mixed $configUrl
 * @property-read Configuration $configuration
 * @property-read string[] $notifications
 */
class Module extends \humhub\components\Module
{
    public const EVENT_AFTER_GET_CONFIGURATION = 'afterGetBannerConfiguration';

    /**
     * @var string defines the icon
     */
    public $icon = 'exclamation-triangle';

    private ?Configuration $_configuration = null;

    public function getConfiguration(): Configuration
    {
        if ($this->_configuration === null) {
            $this->_configuration = new Configuration(['settingsManager' => $this->settings]);
            $this->_configuration->loadBySettings();

            $evt = new Event(['result' => $this->_configuration]);
            Event::trigger($this, static::EVENT_AFTER_GET_CONFIGURATION, $evt);
            $this->_configuration = $evt->result;
        }

        return $this->_configuration;
    }

    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/banner/config']);
    }

    /**
     * @inerhitdoc
     */
    public function getName()
    {
        return Yii::t('BannerModule.base', 'Banner');
    }

    /**
     * @inerhitdoc
     */
    public function getDescription()
    {
        return Yii::t('BannerModule.base', 'Add a customizable banner at the top of the screen');
    }
}
