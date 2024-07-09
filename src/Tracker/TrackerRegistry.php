<?php
/**
* @category  HackOro
* @package   CustomerTrackingBundle
* @author    Chris Rossi <chris.rossi@aligent.com.au>
* @copyright 2019 Aligent Consulting & Friends of Oro
* @license   http://opensource.org/licenses/MIT MIT
*/

namespace HackOro\CustomerTrackingBundle\Tracker;

use LogicException;

class TrackerRegistry
{
    /**
     * @var AbstractTracker[]
     */
    protected array $trackers = [];

    /**
     * Add tracker to the registry
     */
    public function addTracker(AbstractTracker $tracker): void
    {
        if (array_key_exists($tracker->getName(), $this->trackers)) {
            throw new LogicException(
                sprintf('Tracker with name "%s" already registered', $tracker->getName())
            );
        }

        $this->trackers[$tracker->getName()] = $tracker;
    }

    /**
     * @return AbstractTracker[]
     */
    public function getTrackers(): array
    {
        return $this->trackers;
    }

    /**
     * Get tracker by name
     *
     * @throws LogicException Throw exception when tracker with specified name not found
     */
    public function getTracker(string $name): AbstractTracker
    {
        if (!array_key_exists($name, $this->trackers)) {
            throw new LogicException(
                sprintf('Tracker with name "%s" does not exist', $name)
            );
        }

        return $this->trackers[$name];
    }
}
