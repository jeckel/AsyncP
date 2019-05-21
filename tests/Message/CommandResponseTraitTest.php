<?php
declare(strict_types=1);

namespace Test\AsyncP\Message;

use AsyncP\Message\CommandResponseTrait;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use RuntimeException;

/**
 * Class ComTest
 * @package Test\AsyncP\Message
 */
final class CommandResponseTraitTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testGetCommandEmptyShouldThrowException()
    {
        $message = $this->getObjectForTrait(CommandResponseTrait::class);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Command is not yet defined');
        $message->getCommand();
    }
}
