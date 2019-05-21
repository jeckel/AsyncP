<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 14:34
 */
namespace AsyncP\Message\Outgoing;

use AsyncP\Message\DocumentInterface;

/**
 * Interface OutgoingDocumentInterface
 * @package AsyncP\Message\Outgoing
 */
interface OutgoingDocumentInterface extends OutgoingInterface, DocumentInterface, OutgoingCommandResponseInterface
{

}
