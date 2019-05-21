<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 14:52
 */
namespace AsyncP\Message\Outgoing;

use AsyncP\Message\ErrorInterface;

/**
 * Interface OutgoingErrorInterface
 * @package AsyncP\Message\Outgoing
 */
interface OutgoingErrorInterface extends OutgoingInterface, ErrorInterface, OutgoingCommandResponseInterface
{

}
