<?php
/**
 * @category  HackOro
 * @package   CustomerTrackingBundle
 * @author    Chris Rossi <chris.rossi@aligent.com.au>
 * @copyright 2019 Aligent Consulting & Friends of Oro
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace HackOro\CustomerTrackingBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class TrackerPass implements CompilerPassInterface
{
    const TAG = 'hack_oro_customer_tracking.tracker';
    const REGISTRY_SERVICE = 'hack_oro_customer_tracking.tracker_registry';

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container): void
    {
        if (!$container->hasDefinition(self::REGISTRY_SERVICE)) {
            return;
        }

        $taggedServices = $container->findTaggedServiceIds(self::TAG);

        if (empty($taggedServices)) {
            return;
        }

        $trackers      = [];
        foreach ($taggedServices as $serviceId => $tags) {
            $trackers[] = $serviceId;
        }

        $registryDefinition = $container->getDefinition(self::REGISTRY_SERVICE);

        foreach ($trackers as $tracker) {
            $registryDefinition->addMethodCall('addTracker', [new Reference($tracker)]);
        }
    }
}
