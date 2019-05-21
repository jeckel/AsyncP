<?php
declare(strict_types=1);

namespace Tests\AsyncP\Factory;

use AsyncP\CorrelationId\CorrelationIdGeneratorInterface;
use AsyncP\Factory\OutgoingMessageFactory;
use AsyncP\Message\CommandInterface;
use AsyncP\Message\EventInterface;
use AsyncP\Message\Incoming\IncomingCommandInterface;
use AsyncP\Message\MessageType;
use AsyncP\Message\Outgoing\OutgoingDocument;
use AsyncP\Message\Outgoing\OutgoingError;
use AsyncP\Message\Outgoing\OutgoingInterface;
use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Throwable;

/**
 * Class OutgoingMessageFactoryTest
 */
final class OutgoingMessageFactoryTest extends TestCase
{
    /** @var string */
    protected $appId = 'my app';

    /** @var CorrelationIdGeneratorInterface|MockObject */
    protected $idGenerator;

    /** @var OutgoingMessageFactory */
    protected $factory;

    /**
     * @throws ReflectionException
     */
    public function setUp(): void
    {
        $this->appId = 'my-app';
        $this->idGenerator = $this->createMock(CorrelationIdGeneratorInterface::class);
        $this->factory = new OutgoingMessageFactory($this->idGenerator, $this->appId);
    }

    /**
     * @test createCommandMessage
     * @throws Exception
     */
    public function testCreateCommandMessageWithoutReplyTo()
    {
        $uuid = '077882b2-f32a-478b-8f75-0bfe8ddb9724';
        $params = ['from' => 'bob', 'to' => 'maurane', 'body' => 'Hello world'];

        $this->idGenerator->expects($this->once())
            ->method('createId')
            ->willReturn($uuid);

        $message = $this->factory->createCommandMessage('SendMail', $params);

        $this->assertInstanceOf(CommandInterface::class, $message);
        $this->assertInstanceOf(OutgoingInterface::class, $message);
        $this->assertEquals(MessageType::COMMAND, $message->getType());
        $this->assertEquals($uuid, $message->getCorrelationId());
        $this->assertEquals($this->appId, $message->getApplicationId());
        $this->assertEquals('SendMail', $message->getCommand());
        $this->assertEquals($params, $message->getParameters());
        $this->assertNull($message->getPublishedAt());
        $this->assertNull($message->getReplyTo());
    }

    /**
     * @test createCommandMessage
     * @throws Exception
     */
    public function testCreateCommandMessageWithReplyTo()
    {
        $uuid = '077882b2-f32a-478b-8f75-0bfe8ddb9724';
        $params = ['from' => 'bob', 'to' => 'maurane', 'body' => 'Hello world'];

        $this->idGenerator->expects($this->once())
            ->method('createId')
            ->willReturn($uuid);

        $message = $this->factory->createCommandMessage('SendMail', $params, 'reply.queue');

        $this->assertInstanceOf(CommandInterface::class, $message);
        $this->assertInstanceOf(OutgoingInterface::class, $message);
        $this->assertEquals(MessageType::COMMAND, $message->getType());
        $this->assertEquals($uuid, $message->getCorrelationId());
        $this->assertEquals($this->appId, $message->getApplicationId());
        $this->assertEquals('SendMail', $message->getCommand());
        $this->assertEquals($params, $message->getParameters());
        $this->assertEquals('reply.queue', $message->getReplyTo());
        $this->assertNull($message->getPublishedAt());
    }

    /**
     * @test createEventMessage
     * @throws Exception
     */
    public function testCreateMinimumEventMessage()
    {
        $uuid = '077882b2-f32a-478b-8f75-0bfe8ddb9724';
        $this->idGenerator->expects($this->once())
            ->method('createId')
            ->willReturn($uuid);

        $message = $this->factory->createEventMessage('new-user');

        $this->assertInstanceOf(EventInterface::class, $message);
        $this->assertInstanceOf(OutgoingInterface::class, $message);
        $this->assertEquals(MessageType::EVENT, $message->getType());
        $this->assertEquals($uuid, $message->getCorrelationId());
        $this->assertEquals($this->appId, $message->getApplicationId());
        $this->assertEquals('new-user', $message->getEventId());
        $this->assertNull($message->getTargetType());
        $this->assertNull($message->getTargetId());
        $this->assertNull($message->getResourceUri());
        $this->assertNull($message->getPublishedAt());
    }

    /**
     * @test createEventMessage
     * @throws Exception
     */
    public function testCreateFullEventMessage()
    {
        $uuid = '077882b2-f32a-478b-8f75-0bfe8ddb9724';
        $this->idGenerator->expects($this->once())
            ->method('createId')
            ->willReturn($uuid);

        $message = $this->factory->createEventMessage('new-user', 'user', 'user-124', 'http://myapp/user/124');

        $this->assertInstanceOf(EventInterface::class, $message);
        $this->assertInstanceOf(OutgoingInterface::class, $message);
        $this->assertEquals(MessageType::EVENT, $message->getType());
        $this->assertEquals($uuid, $message->getCorrelationId());
        $this->assertEquals($this->appId, $message->getApplicationId());
        $this->assertEquals('new-user', $message->getEventId());
        $this->assertEquals('user', $message->getTargetType());
        $this->assertEquals('user-124', $message->getTargetId());
        $this->assertEquals('http://myapp/user/124', $message->getResourceUri());
        $this->assertNull($message->getPublishedAt());
    }

    /**
     * @test createDocumentMessage
     * @throws Exception
     */
    public function testCreateDocumentMessage()
    {
        $uuid = '077882b2-f32a-478b-8f75-0bfe8ddb9724';
        $this->idGenerator->expects($this->once())
            ->method('createId')
            ->willReturn($uuid);

        $command = $this->createMock(IncomingCommandInterface::class);
        $command->expects($this->once())
            ->method('getCorrelationId')
            ->willReturn('foo-bar');

        $message = $this->factory->createDocumentMessage(['foo' => 'bar'], $command);

        $this->assertInstanceOf(OutgoingDocument::class, $message);
        $this->assertInstanceOf(OutgoingInterface::class, $message);
        $this->assertEquals(MessageType::DOCUMENT, $message->getType());
        $this->assertEquals($uuid, $message->getCorrelationId());
        $this->assertEquals($this->appId, $message->getApplicationId());
        $this->assertEquals(['foo' => 'bar'], $message->getDocument());
        $this->assertSame($command, $message->getCommand());
        $this->assertEquals('foo-bar', $message->getCommandId());
        $this->assertNull($message->getPublishedAt());
    }

    /**
     * @test createErrorMessage
     * @throws Exception
     */
    public function testCreateErrorMessage()
    {
        $uuid = '077882b2-f32a-478b-8f75-0bfe8ddb9724';
        $this->idGenerator->expects($this->once())
            ->method('createId')
            ->willReturn($uuid);

        $command = $this->createMock(IncomingCommandInterface::class);
        $command->expects($this->once())
            ->method('getCorrelationId')
            ->willReturn('foo-bar');

        $message = $this->factory->createErrorMessage('ERR-1234', 'Undefined use case', $command);

        $this->assertInstanceOf(OutgoingError::class, $message);
        $this->assertInstanceOf(OutgoingInterface::class, $message);
        $this->assertEquals(MessageType::ERROR, $message->getType());
        $this->assertEquals($uuid, $message->getCorrelationId());
        $this->assertEquals($this->appId, $message->getApplicationId());
        $this->assertEquals('ERR-1234', $message->getErrorCode());
        $this->assertEquals('Undefined use case', $message->getErrorMessage());
        $this->assertSame($command, $message->getCommand());
        $this->assertEquals('foo-bar', $message->getCommandId());
        $this->assertNull($message->getPublishedAt());
    }

    /**
     * @test createErrorFromException
     * @throws Exception
     */
    public function testCreateErrorFromException()
    {
        $uuid = '077882b2-f32a-478b-8f75-0bfe8ddb9724';
        $this->idGenerator->expects($this->once())
            ->method('createId')
            ->willReturn($uuid);

        $command = $this->createMock(IncomingCommandInterface::class);
        $command->expects($this->once())
            ->method('getCorrelationId')
            ->willReturn('foo-bar');

        try {
            throw new Exception('There is an error', 999);
        } catch (Throwable $e) {
            $message = $this->factory->createErrorFromException($e, $command);

            $this->assertInstanceOf(OutgoingError::class, $message);
            $this->assertInstanceOf(OutgoingInterface::class, $message);
            $this->assertEquals(MessageType::ERROR, $message->getType());
            $this->assertEquals($uuid, $message->getCorrelationId());
            $this->assertEquals($this->appId, $message->getApplicationId());
            $this->assertEquals('999', $message->getErrorCode());
            $this->assertEquals('There is an error', $message->getErrorMessage());
            $this->assertSame($command, $message->getCommand());
            $this->assertEquals('foo-bar', $message->getCommandId());
            $this->assertNull($message->getPublishedAt());
        }
    }
}
