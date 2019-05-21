<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 13:39
 */

namespace AsyncP\Message\Outgoing;

use AsyncP\Message\CommandResponseTrait;
use AsyncP\Message\DocumentInterface;
use AsyncP\Message\DocumentTrait;
use AsyncP\Message\MessageTrait;

/**
 * Class DocumentMessage
 * @package AsyncP\Message\Outgoing
 */
class DocumentMessage implements DocumentInterface, OutgoingMessageInterface
{
    use MessageTrait;
    use DocumentTrait;
    use CommandResponseTrait;
}
