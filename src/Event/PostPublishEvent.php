<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 16:17
 */

namespace AsyncP\Event;

/**
 * Class PostPublishEvent
 * @package AsyncP\Event
 */
class PostPublishEvent extends EventAbstract
{
    const EVENT_NAME = 'async-post-publish-message';

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return self::EVENT_NAME;
    }
}
