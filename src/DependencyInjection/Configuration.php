<?php
/**
 * @category  HackOro
 * @package   CustomerTrackingBundle
 * @author    Chris Rossi <chris.rossi@aligent.com.au>
 * @copyright 2019 Aligent Consulting & Friends of Oro
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace HackOro\CustomerTrackingBundle\DependencyInjection;

use HackOro\CustomerTrackingBundle\Tracker\FullStoryTracker;
use Oro\Bundle\ConfigBundle\Config\ConfigManager;
use Oro\Bundle\ConfigBundle\DependencyInjection\SettingsBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    // LogRocket
    const LOGROCKET_IS_ENABLED = 'logrocket_is_enabled';
    const LOGROCKET_APP_ID = 'logrocket_app_id';

    // FullStory
    const FULLSTORY_IS_ENABLED = 'fullstory_is_enabled';
    const FULLSTORY_ORG = 'fullstory_org';
    const FULLSTORY_DEBUG_ENABLED = 'fullstory_debug_enabled';
    const FULLSTORY_NAMESPACE = 'fullstory_namespace';

    // Google Analytics
    const GOOGLE_GA_IS_ENABLED = 'google_ga_is_enabled';
    const GOOGLE_GA_USER_ID = 'google_ga_user_id';

    // Google Tag Manager
    const GOOGLE_GTM_IS_ENABLED = 'google_gtm_is_enabled';
    const GOOGLE_GTM_USER_ID = 'google_gtm_user_id';

    // Hotjar
    const HOTJAR_IS_ENABLED = 'hotjar_is_enabled';
    const HOTJAR_SITE_ID = 'hotjar_site_id';

    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root(HackOroCustomerTrackingExtension::ALIAS);

        SettingsBuilder::append(
            $rootNode,
            [
                self::LOGROCKET_IS_ENABLED        => ['type' => 'boolean', 'value' => false],
                self::LOGROCKET_APP_ID            => ['type' => 'scalar', 'value' => null],
                self::FULLSTORY_IS_ENABLED        => ['type' => 'boolean', 'value' => false],
                self::FULLSTORY_ORG               => ['type' => 'scalar', 'value' => null],
                self::FULLSTORY_DEBUG_ENABLED     => ['type' => 'boolean', 'value' => false],
                self::FULLSTORY_NAMESPACE         => [
                    'type' => 'scalar',
                    'value' => FullStoryTracker::DEFAULT_NAMESPACE,
                ],
                self::GOOGLE_GA_IS_ENABLED        => ['type' => 'boolean', 'value' => false],
                self::GOOGLE_GA_USER_ID           => ['type' => 'scalar', 'value' => null],
                self::GOOGLE_GTM_IS_ENABLED       => ['type' => 'boolean', 'value' => false],
                self::GOOGLE_GTM_USER_ID          => ['type' => 'scalar', 'value' => null],
                self::HOTJAR_IS_ENABLED           => ['type' => 'boolean', 'value' => false],
                self::HOTJAR_SITE_ID              => ['type' => 'scalar', 'value' => null],
            ]
        );
        return $treeBuilder;
    }


    /**
     * @param string $key
     * @return string
     */
    public static function getConfigKeyByName($key)
    {
        return implode(ConfigManager::SECTION_MODEL_SEPARATOR, [HackOroCustomerTrackingExtension::ALIAS, $key]);
    }
}
