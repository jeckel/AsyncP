<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 11:32
 */
namespace AsyncP\Message\Outgoing;

use AsyncP\Message\EventTrait;
use AsyncP\Message\MessageTrait;

/**
 * Class OutgoingEvent
 * @package AsyncP\Message\Outgoing
 */
class OutgoingEvent implements OutgoingEventInterface
{
    use MessageTrait;
    use EventTrait;
}
