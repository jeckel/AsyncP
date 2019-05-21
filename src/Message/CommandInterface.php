<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 09:32
 */
namespace AsyncP\Message;

/**
 * Interface CommandInterface
 */
interface CommandInterface extends MessageInterface
{
    /**
     * @return string
     */
    public function getCommand(): string;

    /**
     * @return array
     */
    public function getParameters(): array;
}
