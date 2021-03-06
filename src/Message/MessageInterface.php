<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 09:32
 */

namespace AsyncP\Message;

use DateTimeInterface;

/**
 * Interface MessageInterface
 */
interface MessageInterface
{
    /**
     * Return message type
     * @return string
     */
    public function getType(): string;

    /**
     * Return unique message id
     *
     * @return string
     */
    public function getCorrelationId(): string;

    /**
     * Return publish timestamp
     * @return DateTimeInterface|null
     */
    public function getPublishedAt(): ?DateTimeInterface;

    /**
     * Return application id
     * @return string
     */
    public function getApplicationId(): string;
}
