<?php
declare(strict_types=1);
/**
 * User: jeckel
 * Date: 21/05/19
 * Time: 10:34
 */

namespace AsyncP\CorrelationId;

/**
 * Interface CorrelationIdGeneratorInterface
 * @package AsyncP\CorrelationId
 */
interface CorrelationIdGeneratorInterface
{
    /**
     * @return string
     */
    public function createId(): string;
}
