<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 16:19
 */
namespace AsyncP\Event;

use AsyncP\Message\MessageInterface;

/**
 * Class EventAbstract
 * @package AsyncP\Event
 */
abstract class EventAbstract
{
    /** @var MessageInterface */
    protected $message;

    /**
     * @return MessageInterface
     */
    public function getMessage(): MessageInterface
    {
        return $this->message;
    }

    /**
     * @param MessageInterface $message
     * @return self
     */
    public function setMessage(MessageInterface $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    abstract public function getEventName(): string;
}
