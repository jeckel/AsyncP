<?php
declare(strict_types=1);

namespace Test\AsyncP\Message;

use AsyncP\Message\Outgoing\OutgoingCommandResponseTrait;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use RuntimeException;

/**
 * Class ComTest
 * @package Test\AsyncP\Message
 */
final class OutgoingCommandResponseTraitTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testGetCommandEmptyShouldThrowException()
    {
        $message = $this->getObjectForTrait(OutgoingCommandResponseTrait::class);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Command is not yet defined');
        $message->getCommand();
    }
}
