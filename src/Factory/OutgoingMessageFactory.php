<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 10:13
 */
namespace AsyncP\Factory;

use AsyncP\CorrelationId\CorrelationIdGeneratorInterface;
use AsyncP\Message\Outgoing\CommandMessage;
use AsyncP\Message\Outgoing\EventMessage;
use Exception;

/**
 * Class OutgoingMessageFactory
 */
class OutgoingMessageFactory
{
    /**
     * @var CorrelationIdGeneratorInterface
     */
    protected $idGenerator;
    /**
     * @var string
     */
    protected $applicationId;

    /**
     * OutgoingMessageFactory constructor.
     * @param CorrelationIdGeneratorInterface $idGenerator
     * @param string                          $applicationId
     */
    public function __construct(CorrelationIdGeneratorInterface $idGenerator, string $applicationId)
    {
        $this->idGenerator = $idGenerator;
        $this->applicationId = $applicationId;
    }

    /**
     * @param string      $command
     * @param array       $params
     * @param string|null $replyTo
     * @return CommandMessage
     * @throws Exception
     */
    public function createCommandMessage(string $command, array $params = [], string $replyTo = null): CommandMessage
    {
        $message = (new CommandMessage())
            ->setCommand($command)
            ->setParameters($params)
            ->setReplyTo($replyTo)
            ->setCorrelationId($this->idGenerator->createId())
            ->setApplicationId($this->applicationId);

        return $message;
    }

    /**
     * @param string      $eventId
     * @param string|null $targetType
     * @param string|null $targetId
     * @param string|null $resourceUri
     * @return EventMessage
     * @throws Exception
     */
    public function createEventMessage(string $eventId, ?string $targetType, ?string $targetId, ?string $resourceUri): EventMessage
    {
        return (new EventMessage())
            ->setEventId($eventId)
            ->setTargetType($targetType)
            ->setTargetId($targetId)
            ->setResourceUri($resourceUri)
            ->setCorrelationId($this->idGenerator->createId())
            ->setApplicationId($this->applicationId);
    }
}
