<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 10:35
 */

namespace AsyncP\CorrelationId;

use Exception;
use Ramsey\Uuid\Uuid;

/**
 * Class UuidCorrelationIdGenerator
 * @package AsyncP\CorrelationId
 */
class UuidCorrelationIdGenerator implements CorrelationIdGeneratorInterface
{
    /**
     * @return string
     * @throws Exception
     */
    public function createId(): string
    {
        return Uuid::uuid4()->toString();
    }
}
