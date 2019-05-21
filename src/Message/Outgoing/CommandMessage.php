<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 10:13
 */

namespace AsyncP\Message\Outgoing;

use AsyncP\Message\CommandInterface;
use AsyncP\Message\CommandTrait;
use AsyncP\Message\MessageTrait;

/**
 * Class CommandMessage
 * @package AsyncP\Message\Outgoing
 */
class CommandMessage implements OutgoingMessageInterface, CommandInterface
{
    use CommandTrait;
}
