<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 14:16
 */

namespace AsyncP\Message\Incoming;

use AsyncP\Message\CommandInterface;

/**
 * Interface IncomingCommandInterface
 * @package AsyncP\Message\Incoming
 */
interface IncomingCommandInterface extends CommandInterface, IncomingMessageInterface
{

}
