<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 13:39
 */

namespace AsyncP\Message;

/**
 * Trait DocumentTrait
 * @package AsyncP\Message
 */
trait DocumentTrait
{
    /**
     * @var array
     */
    protected $document = [];

    /**
     * @return string
     */
    public function getType(): string
    {
        return MessageType::DOCUMENT;
    }

    /**
     * @return array
     */
    public function getDocument(): array
    {
        return $this->document;
    }

    /**
     * @param array $document
     * @return self
     */
    public function setDocument(array $document): self
    {
        $this->document = $document;
        return $this;
    }
}
