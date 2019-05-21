<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 09:59
 */

namespace AsyncP\Message;

/**
 * Trait CommandTrait
 * @package AsyncP\Message
 */
trait CommandTrait
{
    /**
     * @var string
     */
    protected $command;

    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @var string|null
     */
    protected $replyTo;

    /**
     * @return string
     */
    public function getType(): string
    {
        return MessageType::COMMAND;
    }

    /**
     * Return command
     *
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     * @return self
     */
    public function setCommand(string $command): self
    {
        $this->command = $command;
        return $this;
    }

    /**
     * Return parameters
     *
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     * @return self
     */
    public function setParameters(array $parameters): self
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReplyTo(): ?string
    {
        return $this->replyTo;
    }

    /**
     * @param string|null $replyTo
     * @return self
     */
    public function setReplyTo(?string $replyTo): self
    {
        $this->replyTo = $replyTo;
        return $this;
    }
}
