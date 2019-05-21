<?php
declare(strict_types=1);

namespace Tests\AsyncP\Factory;

use AsyncP\CorrelationId\CorrelationIdGeneratorInterface;
use AsyncP\Factory\OutgoingMessageFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class OutgoingMessageFactoryTest
 */
final class OutgoingMessageFactoryTest extends TestCase
{

    /**
     * @test createCommandMessage
     */
    public function testCreateCommandMessage()
    {
        $uuid = '077882b2-f32a-478b-8f75-0bfe8ddb9724';
        $appId = 'my-app';
        $params = ['from' => 'bob', 'to' => 'maurane', 'body' => 'Hello world'];

        $idGenerator = $this->createMock(CorrelationIdGeneratorInterface::class);
        $idGenerator->expects($this->once())
            ->method('createId')
            ->willReturn($uuid);

        $factory = new OutgoingMessageFactory($idGenerator, $appId);

        $message = $factory->createCommandMessage('SendMail', $params);

        $this->assertEquals($uuid, $message->getCorrelationId());
        $this->assertEquals($appId, $message->getApplicationId());
        $this->assertEquals('SendMail', $message->getCommand());
        $this->assertEquals($params, $message->getParameters());
        $this->assertNull($message->getPublishedAt());
        $this->assertNull($message->getReplyTo());
    }
}
