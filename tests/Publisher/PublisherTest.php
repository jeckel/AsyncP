<?php
declare(strict_types=1);

namespace Tests\AsyncP\Publisher;

use AsyncP\Event\PostPublishEvent;
use AsyncP\Event\PrePublishEvent;
use AsyncP\Message\Outgoing\OutgoingInterface;
use AsyncP\Publisher\Adapter\PublisherAdapterInterface;
use AsyncP\Publisher\Publisher;
use DateTimeImmutable;
use Jeckel\Clock\ClockInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\EventDispatcherInterface;
use ReflectionException;

/**
 * Class PublisherTest
 * @package Tests\AsyncP\Publisher
 */
final class PublisherTest extends TestCase
{
    /** @var PublisherAdapterInterface|MockObject */
    protected $adapter;

    /** @var ClockInterface|MockObject */
    protected $clock;

    /** @var Publisher */
    protected $publisher;

    /**
     * @throws ReflectionException
     */
    public function setUp(): void
    {
        $this->adapter = $this->createMock(PublisherAdapterInterface::class);
        $this->clock = $this->createMock(ClockInterface::class);
        $this->publisher = new Publisher($this->clock, $this->adapter);
    }

    /**
     * @test publish
     * @throws ReflectionException
     */
    public function testPublishWithoutEventDispatcher()
    {
        $publishedTime = new DateTimeImmutable('2019-02-03 12:13:14');

        $message = $this->createMock(OutgoingInterface::class);
        $message->expects($this->once())
            ->method('setPublishedAt')
            ->with($publishedTime);

        $this->clock->expects($this->once())
            ->method('now')
            ->willReturn($publishedTime);

        $this->adapter->expects($this->once())
            ->method('publish')
            ->with($this->callback(function ($subject) use ($message) {
                $this->assertSame($message, $subject);
                $this->assertNull($message->getPublishedAt());
                return true;
            }))
            ->willReturn($this->adapter);

        $this->publisher->publish($message);
    }

    /**
     * @test publish
     * @throws ReflectionException
     */
    public function testPublishWithEventDispatcher()
    {
        $publishedTime = new DateTimeImmutable('2019-02-03 12:13:14');

        $publishedTimeSet = false;

        $message = $this->createMock(OutgoingInterface::class);
        $message->expects($this->once())
            ->method('setPublishedAt')
            ->with($this->callback(function ($time) use ($publishedTime, &$publishedTimeSet) {
                $this->assertSame($publishedTime, $time);
                $this->assertFalse($publishedTimeSet);
                $publishedTimeSet = true;
                return true;
            }));

        $this->clock->expects($this->once())
            ->method('now')
            ->willReturn($publishedTime);

        $this->adapter->expects($this->once())
            ->method('publish')
            ->with($this->callback(function ($subject) use ($message) {
                $this->assertSame($message, $subject);
                $this->assertNull($message->getPublishedAt());
                return true;
            }))
            ->willReturn($this->adapter);

        /** @var EventDispatcherInterface|MockObject $eventDispatcher */
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);

        // Check prePublish event
        $eventDispatcher->expects($this->at(0))
            ->method('dispatch')
            ->with($this->callback(function ($event) use ($message) {
                $this->assertInstanceOf(PrePublishEvent::class, $event);
                $this->assertEquals(PrePublishEvent::EVENT_NAME, $event->getEventName());
                $this->assertSame($message, $event->getMessage());
                $this->assertNull($message->getPublishedAt());
                return true;
            }));

        // Check postPublish event
        $eventDispatcher->expects($this->at(1))
            ->method('dispatch')
            ->with($this->callback(function ($event) use ($message, $publishedTime, &$publishedTimeSet) {
                $this->assertInstanceOf(PostPublishEvent::class, $event);
                $this->assertEquals(PostPublishEvent::EVENT_NAME, $event->getEventName());
                $this->assertSame($message, $event->getMessage());
                $this->assertTrue($publishedTimeSet);
                return true;
            }));

        $this->publisher->setEventDispatcher($eventDispatcher);

        $this->publisher->publish($message);
        $this->assertTrue($publishedTimeSet);
    }
}
