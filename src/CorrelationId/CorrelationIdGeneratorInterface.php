<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 10:34
 */

namespace AsyncP\CorrelationId;

use Exception;

/**
 * Interface CorrelationIdGeneratorInterface
 * @package AsyncP\CorrelationId
 */
interface CorrelationIdGeneratorInterface
{
    /**
     * @return string
     * @throws Exception
     */
    public function createId(): string;
}
