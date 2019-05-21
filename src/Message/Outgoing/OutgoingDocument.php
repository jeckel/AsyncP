<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 13:39
 */

namespace AsyncP\Message\Outgoing;

use AsyncP\Message\DocumentTrait;
use AsyncP\Message\MessageTrait;

/**
 * Class OutgoingDocument
 * @package AsyncP\Message\Outgoing
 */
class OutgoingDocument implements OutgoingDocumentInterface
{
    use MessageTrait;
    use DocumentTrait;
    use OutgoingCommandResponseTrait;
}
