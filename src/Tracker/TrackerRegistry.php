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
    protected $trackers = [];

    /**
     * Add tracker to the registry
     *
     * @param AbstractTracker $tracker
     */
    public function addTracker(AbstractTracker $tracker)
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
    public function getTrackers()
    {
        return $this->trackers;
    }

    /**
     * Get tracker by name
     *
     * @param string $name
     * @return AbstractTracker
     * @throws LogicException Throw exception when tracker with specified name not found
     */
    public function getTracker($name)
    {
        if (!array_key_exists($name, $this->trackers)) {
            throw new LogicException(
                sprintf('Tracker with name "%s" does not exist', $name)
            );
        }

        return $this->trackers[$name];
    }
}
