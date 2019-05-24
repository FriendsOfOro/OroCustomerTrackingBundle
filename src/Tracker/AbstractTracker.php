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
use Oro\Bundle\ConfigBundle\Config\ConfigManager;

abstract class AbstractTracker
{
    /** @var ConfigManager */
    protected $configManager;

    public function __construct(ConfigManager $configManager)
    {
        $this->configManager = $configManager;
    }

    abstract public function getName() : string;

    /**
     * @param string $name
     * @param string $default|null
     * @return mixed
     */
    public function getConfigValue(string $name, string $default = null)
    {
        return $this->configManager->get(Configuration::getConfigKeyByName($name), $default);
    }
}
