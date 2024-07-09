<?php
/**
 * @category  HackOro
 * @package   CustomerTrackingBundle
 * @author    Chris Rossi <chris.rossi@aligent.com.au>
 * @copyright 2019 Aligent Consulting & Friends of Oro
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace HackOro\CustomerTrackingBundle\Tracker;

use HackOro\CustomerTrackingBundle\DependencyInjection\Configuration;

class LogRocketTracker extends AbstractTracker
{
    const NAME = 'logrocket';

    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * Is LogRocket enabled?
     */
    public function isEnabled(): bool
    {
        return (bool) $this->getConfigValue(Configuration::LOGROCKET_IS_ENABLED);
    }

    /**
     * What is the LogRocket APP ID?
     */
    public function getAppId(): ?string
    {
        return $this->getConfigValue(Configuration::LOGROCKET_APP_ID);
    }
}
