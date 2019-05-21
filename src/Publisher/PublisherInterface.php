<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 16:07
 */

namespace AsyncP\Publisher;

use AsyncP\Message\Outgoing\OutgoingInterface;

/**
 * interface PublisherInterface
 * @package AsyncP\Publisher
 */
interface PublisherInterface
{
    /**
     * @param OutgoingInterface $message
     * @return PublisherInterface
     */
    public function publish(OutgoingInterface $message): self;
}
