<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 09:33
 */
namespace AsyncP\Message;

/**
 * Interface ErrorInterface
 */
interface ErrorInterface extends MessageInterface, CommandResponseInterface
{
    /**
     * @return string
     */
    public function getErrorCode(): string;

    /**
     * @return string
     */
    public function getErrorMessage(): string;
}
