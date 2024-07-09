<?php
/**
 * @category  HackOro
 * @package   CustomerTrackingBundle
 * @author    Chris Rossi <chris.rossi@aligent.com.au>
 * @copyright 2019 Aligent Consulting & Friends of Oro
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace HackOro\CustomerTrackingBundle\Layout\DataProvider;

use HackOro\CustomerTrackingBundle\Tracker\AbstractTracker;
use HackOro\CustomerTrackingBundle\Tracker\TrackerRegistry;

class CustomerTrackingDataProvider
{
    private TrackerRegistry $trackerRegistry;

    public function __construct(TrackerRegistry $trackerRegistry)
    {
        $this->trackerRegistry = $trackerRegistry;
    }

    public function getTracker(string $name): ?AbstractTracker
    {
        return $this->trackerRegistry->getTracker($name);
    }
}
