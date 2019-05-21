<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 11:29
 */

namespace AsyncP\Message;

/**
 * Trait EventTrait
 * @package AsyncP\Message
 */
trait EventTrait
{
    /** @var string */
    protected $eventId;

    /** @var string|null */
    protected $targetType;

    /** @var string|null */
    protected $targetId;

    /** @var string|null */
    protected $resourceUri;

    /**
     * @return string
     */
    public function getType(): string
    {
        return MessageType::EVENT;
    }

    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->eventId;
    }

    /**
     * @param string $eventId
     * @return self
     */
    public function setEventId(string $eventId): self
    {
        $this->eventId = $eventId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTargetType(): ?string
    {
        return $this->targetType;
    }

    /**
     * @param string|null $targetType
     * @return self
     */
    public function setTargetType(?string $targetType): self
    {
        $this->targetType = $targetType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTargetId(): ?string
    {
        return $this->targetId;
    }

    /**
     * @param string|null $targetId
     * @return self
     */
    public function setTargetId(?string $targetId): self
    {
        $this->targetId = $targetId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getResourceUri(): ?string
    {
        return $this->resourceUri;
    }

    /**
     * @param string|null $resourceUri
     * @return self
     */
    public function setResourceUri(?string $resourceUri): self
    {
        $this->resourceUri = $resourceUri;
        return $this;
    }
}
