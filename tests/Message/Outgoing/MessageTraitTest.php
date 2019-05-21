<?php
declare(strict_types=1);

namespace Test\AsyncP\Message;

use AsyncP\Message\MessageTrait;
use PHPUnit\Framework\TestCase;

/**
 * Class Test
 * @package Test\AsyncP\Message
 */
final class MessageTraitTest extends TestCase
{
    /**
     * @test getCorrelationId
     */
    public function testGetCorrelationIdUndefinedShouldThrowAndException()
    {
        $message = $this->getObjectForTrait(MessageTrait::class);
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Correlation id has not been initialized');

        $message->getCorrelationId();
    }

    /**
     * @test getCorrelationId
     */
    public function testGetCorrelationIdEmptyShouldThrowAndException()
    {
        $message = $this->getObjectForTrait(MessageTrait::class);
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Correlation id has not been initialized');

        $message->setCorrelationId('');

        $message->getCorrelationId();
    }
}
