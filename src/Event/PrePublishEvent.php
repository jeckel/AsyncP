<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 16:16
 */

namespace AsyncP\Event;

/**
 * Class PrePublishEvent
 * @package AsyncP\Event
 */
class PrePublishEvent extends EventAbstract
{
    const EVENT_NAME = 'async-pre-publish-message';

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return self::EVENT_NAME;
    }
}
