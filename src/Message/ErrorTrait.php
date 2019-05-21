<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 14:50
 */
namespace AsyncP\Message;

/**
 * Trait ErrorTrait
 * @package AsyncP\Message\Outgoing
 */
trait ErrorTrait
{
    /** @var string */
    protected $errorCode = '';

    /** @var string */
    protected $errorMessage = '';

    /**
     * @return string
     */
    public function getType(): string
    {
        return MessageType::ERROR;
    }

    /**
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * @param string $errorCode
     * @return self
     */
    public function setErrorCode(string $errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     * @return self
     */
    public function setErrorMessage(string $errorMessage): self
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }
}
