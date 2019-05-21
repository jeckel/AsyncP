<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 13:43
 */

namespace AsyncP\Message;

/**
 * Interface CommandResponseInterface
 * @package AsyncP\Message
 */
interface CommandResponseInterface extends MessageInterface
{
    /**
     * Return Command to which this message is a response
     * @return string
     */
    public function getCommandId(): string;
}
