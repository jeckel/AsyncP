<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 14:25
 */
namespace AsyncP\Message\Outgoing;

use AsyncP\Message\CommandInterface;

/**
 * Interface OutgoingCommand
 * @package AsyncP\Message\Outgoing
 */
interface OutgoingCommandInterface extends OutgoingInterface, CommandInterface
{

}
