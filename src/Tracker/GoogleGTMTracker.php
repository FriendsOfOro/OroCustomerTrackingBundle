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

class GoogleGTMTracker extends AbstractTracker
{
    const NAME = 'google_gtm';

    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool) $this->getConfigValue(Configuration::GOOGLE_GTM_IS_ENABLED);
    }

    /**
     * @return string
     */
    public function getUserId(): ?string
    {
        return $this->getConfigValue(Configuration::GOOGLE_GTM_USER_ID);
    }
}
