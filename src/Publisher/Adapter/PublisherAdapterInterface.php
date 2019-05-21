<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 17:46
 */

namespace AsyncP\Publisher\Adapter;

use AsyncP\Message\Outgoing\OutgoingInterface;

/**
 * Interface PublisherAdapterInterface
 * @package AsyncP\Publisher\Adapter
 */
interface PublisherAdapterInterface
{
    /**
     * @param OutgoingInterface $message
     * @return PublisherAdapterInterface
     */
    public function publish(OutgoingInterface $message): self;
}
