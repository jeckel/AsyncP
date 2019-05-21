<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 11:32
 */

namespace AsyncP\Message\Outgoing;

use AsyncP\Message\EventInterface;
use AsyncP\Message\EventTrait;
use AsyncP\Message\MessageTrait;

/**
 * Class EventMessage
 * @package AsyncP\Message\Outgoing
 */
class EventMessage implements EventInterface, OutgoingMessageInterface
{
    use MessageTrait;
    use EventTrait;
}
