<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 13:44
 */

namespace AsyncP\Message;

use AsyncP\Message\Incoming\IncomingCommandInterface;
use RuntimeException;

/**
 * Trait CommandResponseTrait
 * @package AsyncP\Message
 */
trait CommandResponseTrait
{
    /**
     * Command to which this message is a response
     * @var IncomingCommandInterface|null
     */
    protected $command;

    /**
     * @return IncomingCommandInterface
     */
    public function getCommand(): IncomingCommandInterface
    {
        if (is_null($this->command)) {
            throw new RuntimeException('Command is not yet defined');
        }
        return $this->command;
    }

    /**
     * @param IncomingCommandInterface $command
     * @return self
     */
    public function setCommand(IncomingCommandInterface $command): self
    {
        $this->command = $command;
        return $this;
    }
}
