<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 10:05
 */

namespace AsyncP\Message;

use DateTimeInterface;

/**
 * Trait MessageTrait
 * @package AsyncP\Message
 */
trait MessageTrait
{
    /**
     * @var string|null
     */
    protected $correlationId;

    /**
     * @var DateTimeInterface|null
     */
    protected $publishedAt;

    /**
     * @var string
     */
    protected $applicationId;

    /**
     * Return unique message id
     *
     * @return string
     */
    public function getCorrelationId(): ?string
    {
        return $this->correlationId;
    }

    /**
     * @param string $correlationId
     * @return self
     */
    public function setCorrelationId(string $correlationId): self
    {
        $this->correlationId = $correlationId;
        return $this;
    }

    /**
     * Return publish timestamp
     * @return DateTimeInterface
     */
    public function getPublishedAt(): ?DateTimeInterface
    {
        return $this->publishedAt;
    }

    /**
     * @param DateTimeInterface|null $publishedAt
     * @return self
     */
    public function setPublishedAt(?DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }

    /**
     * Return application id
     * @return string
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    /**
     * @param string $applicationId
     * @return self
     */
    public function setApplicationId(string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }
}
