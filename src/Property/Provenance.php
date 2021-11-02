<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ResultProvenance;

/**
 * @author Laurent Laville
 */
trait Provenance
{
    /**
     * @var ResultProvenance
     */
    protected $provenance;

    /**
     * @param ResultProvenance $provenance
     */
    public function setProvenance(ResultProvenance $provenance): void
    {
        $this->provenance = $provenance;
    }
}
