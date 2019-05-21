<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 11:10
 */

namespace AsyncP\Message;

/**
 * Interface MessageType
 * @package AsyncP\Message
 */
interface MessageType
{
    const COMMAND = 'COMMAND';
    const EVENT = 'EVENT';
    const DOCUMENT = 'DOCUMENT';
}
