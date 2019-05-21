<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 09:32
 */
namespace AsyncP\Message;

/**
 * Interface DocumentInterface
 */
interface DocumentInterface extends MessageInterface, CommandResponseInterface
{
    /**
     * @return array
     */
    public function getDocument(): array;
}
