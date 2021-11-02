<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ReportingDescriptorReference;

/**
 * @author Laurent Laville
 */
trait TaxaReferences
{
    /**
     * @var ReportingDescriptorReference[]
     */
    protected $taxa;

    /**
     * @param ReportingDescriptorReference[] $taxa
     */
    public function addTaxa(array $taxa): void
    {
        foreach ($taxa as $taxonomy) {
            if ($taxonomy instanceof ReportingDescriptorReference) {
                $this->taxa[] = $taxonomy;
            }
        }
    }
}
