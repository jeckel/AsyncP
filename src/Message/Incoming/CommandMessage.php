<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 09:57
 */

namespace AsyncP\Message\Incoming;

use AsyncP\Message\CommandInterface;
use AsyncP\Message\CommandTrait;

/**
 * Class CommandMessage
 * @package AsyncP\Message\Incoming
 */
class CommandMessage implements CommandInterface, IncomingMessageInterface
{
    use CommandTrait;
}
