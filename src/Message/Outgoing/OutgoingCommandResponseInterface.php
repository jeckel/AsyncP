<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 14:56
 */
namespace AsyncP\Message\Outgoing;

use AsyncP\Message\CommandResponseInterface;
use AsyncP\Message\Incoming\IncomingCommandInterface;

/**
 * Interface OutgoingCommandResponseInterface
 * @package AsyncP\Message\Outgoing
 */
interface OutgoingCommandResponseInterface extends CommandResponseInterface
{
    /**
     * Return Command to which this message is a response
     *
     * @return IncomingCommandInterface
     */
    public function getCommand(): IncomingCommandInterface;
}
