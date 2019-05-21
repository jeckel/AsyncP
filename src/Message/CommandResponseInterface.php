<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 13:43
 */

namespace AsyncP\Message;

use AsyncP\Message\Incoming\IncomingCommandInterface;

/**
 * Interface CommandResponseInterface
 * @package AsyncP\Message
 */
interface CommandResponseInterface extends MessageInterface
{
    /**
     * Return Command to which this message is a response
     * @return IncomingCommandInterface
     */
    public function getCommand(): IncomingCommandInterface;
}
