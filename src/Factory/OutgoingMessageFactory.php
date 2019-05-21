<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 10:13
 */

namespace AsyncP\Factory;

use AsyncP\CorrelationId\CorrelationIdGeneratorInterface;
use AsyncP\Message\Incoming\IncomingCommandInterface;
use AsyncP\Message\Outgoing\OutgoingCommandInterface;
use AsyncP\Message\Outgoing\OutgoingCommand;
use AsyncP\Message\Outgoing\OutgoingDocument;
use AsyncP\Message\Outgoing\OutgoingDocumentInterface;
use AsyncP\Message\Outgoing\OutgoingEvent;
use AsyncP\Message\Outgoing\OutgoingEventInterface;
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
     * @return OutgoingCommandInterface
     * @throws Exception
     */
    public function createCommandMessage(
        string $command,
        array $params = [],
        string $replyTo = null
    ): OutgoingCommandInterface {
        $message = (new OutgoingCommand())
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
     * @return OutgoingEventInterface
     * @throws Exception
     */
    public function createEventMessage(
        string $eventId,
        string $targetType = null,
        string $targetId = null,
        string $resourceUri = null
    ): OutgoingEventInterface {
        return (new OutgoingEvent())
            ->setEventId($eventId)
            ->setTargetType($targetType)
            ->setTargetId($targetId)
            ->setResourceUri($resourceUri)
            ->setCorrelationId($this->idGenerator->createId())
            ->setApplicationId($this->applicationId);
    }

    /**
     * @param array                    $document
     * @param IncomingCommandInterface $command
     * @return OutgoingDocumentInterface
     * @throws Exception
     */
    public function createDocumentMessage(
        array $document,
        IncomingCommandInterface $command
    ): OutgoingDocumentInterface {
        return (new OutgoingDocument())
            ->setDocument($document)
            ->setCommand($command)
            ->setCorrelationId($this->idGenerator->createId())
            ->setApplicationId($this->applicationId);
    }
}
