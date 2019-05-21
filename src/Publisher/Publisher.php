<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 16:08
 */

namespace AsyncP\Publisher;

use AsyncP\Event\PostPublishEvent;
use AsyncP\Event\PrePublishEvent;
use AsyncP\Message\Outgoing\OutgoingInterface;
use AsyncP\Publisher\Adapter\PublisherAdapterInterface;
use Jeckel\Clock\ClockInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * Class PublisherAbstract
 * @package AsyncP\Publisher
 */
class Publisher implements PublisherInterface
{
    /** @var ClockInterface */
    protected $clock;

    /** @var EventDispatcherInterface|null */
    protected $eventDispatcher;

    /** @var PublisherAdapterInterface */
    protected $adapter;

    /**
     * Publisher constructor.
     * @param ClockInterface            $clock
     * @param PublisherAdapterInterface $adapter
     */
    public function __construct(ClockInterface $clock, PublisherAdapterInterface $adapter)
    {
        $this->clock = $clock;
        $this->adapter = $adapter;
    }

    /**
     * @param EventDispatcherInterface|null $eventDispatcher
     * @return self
     */
    public function setEventDispatcher(?EventDispatcherInterface $eventDispatcher): self
    {
        $this->eventDispatcher = $eventDispatcher;
        return $this;
    }

    /**
     * @param OutgoingInterface $message
     * @return PublisherInterface
     */
    public function publish(OutgoingInterface $message): PublisherInterface
    {
        $this->prePublish($message);
        $this->adapter->publish($message);
        $this->postPublish($message);
        return $this;
    }

    /**
     * @param OutgoingInterface $message
     */
    protected function prePublish(OutgoingInterface $message)
    {
        if ($this->eventDispatcher) {
            $this->eventDispatcher->dispatch((new PrePublishEvent())->setMessage($message));
        }
    }

    /**
     * @param OutgoingInterface $message
     */
    protected function postPublish(OutgoingInterface $message)
    {
        $message->setPublishedAt($this->clock->now());

        if ($this->eventDispatcher) {
            $this->eventDispatcher->dispatch((new PostPublishEvent())->setMessage($message));
        }
    }
}
