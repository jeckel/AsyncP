<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 15:26
 */

namespace AsyncP\Message\Outgoing;

use AsyncP\Message\ErrorTrait;
use AsyncP\Message\MessageTrait;

/**
 * Class OutgoingError
 * @package AsyncP\Message\Outgoing
 */
class OutgoingError implements OutgoingErrorInterface
{
    use MessageTrait;
    use ErrorTrait;
    use OutgoingCommandResponseTrait;
}
