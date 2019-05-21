<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 09:33
 */
namespace AsyncP\Message;

/**
 * Interface EventInterface
 */
interface EventInterface extends MessageInterface
{
    /**
     * Return event identifier
     *
     * @return string
     */
    public function getEventId(): string;

    /**
     * Return event target type / class
     *
     * @return string|null
     */
    public function getTargetType(): ?string;

    /**
     * Return event target's unique identifier
     *
     * @return string|null
     */
    public function getTargetId(): ?string;

    /**
     * Return event resource uri where application can retrieve additional data
     *
     * @return string|null
     */
    public function getResourceUri(): ?string;
}
