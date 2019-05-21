<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 14:30
 */
namespace AsyncP\Message\Outgoing;

use AsyncP\Message\EventInterface;

/**
 * Interface OutgoingEventInterface
 * @package AsyncP\Message\Outgoing
 */
interface OutgoingEventInterface extends OutgoingInterface, EventInterface
{

}
