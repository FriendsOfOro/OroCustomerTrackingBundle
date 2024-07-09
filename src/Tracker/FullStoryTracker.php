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

class FullStoryTracker extends AbstractTracker
{
    const NAME = 'fullstory';

    /**
     * For successful recording, please do not change this value;
     * it should always be fullstory.com
     * https://help.fullstory.com/55115-roll-your-own/370136
     */
    const HOST = 'fullstory.com';
    const DEFAULT_NAMESPACE = 'FS';

    public function getName(): string
    {
        return self::NAME;
    }

    public function isEnabled(): bool
    {
        return (bool) $this->getConfigValue(Configuration::FULLSTORY_IS_ENABLED);
    }

    public function getOrg(): ?string
    {
        return $this->getConfigValue(Configuration::FULLSTORY_ORG);
    }

    public function getDebugEnabled(): bool
    {
        return (bool) $this->getConfigValue(Configuration::FULLSTORY_DEBUG_ENABLED);
    }

    public function getNamespace(): ?string
    {
        return $this->getConfigValue(Configuration::FULLSTORY_NAMESPACE) ?? self::DEFAULT_NAMESPACE;
    }

    public function getHost(): ?string
    {
        return self::HOST;
    }
}
