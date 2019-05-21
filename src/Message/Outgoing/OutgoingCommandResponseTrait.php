<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 14:58
 */
namespace AsyncP\Message\Outgoing;

use AsyncP\Message\Incoming\IncomingCommandInterface;
use RuntimeException;

/**
 * Trait OutgoingCommandResponseTrait
 * @package AsyncP\Message\Outgoing
 */
trait OutgoingCommandResponseTrait
{
    /**
     * @var IncomingCommandInterface|null
     */
    protected $command;

    /**
     * Return Command to which this message is a response
     * @return string
     */
    public function getCommandId(): string
    {
        return $this->getCommand()->getCorrelationId();
    }

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
