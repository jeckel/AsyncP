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

/**
 * Class EventMessage
 * @package AsyncP\Message\Outgoing
 */
class EventMessage implements EventInterface, OutgoingMessageInterface
{
    use EventTrait;
}
