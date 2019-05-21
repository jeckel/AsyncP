<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 09:34
 */
namespace AsyncP\Message\Outgoing;

use AsyncP\Message\MessageInterface;
use DateTimeInterface;

/**
 * Interface OutgoingInterface
 */
interface OutgoingInterface extends MessageInterface
{
    /**
     * @param DateTimeInterface $dateTime
     * @return self
     */
    public function setPublishedAt(DateTimeInterface $dateTime);
}
