<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ReportingDescriptor;

/**
 * @author Laurent Laville
 */
trait Taxa
{
    /**
     * @var ReportingDescriptor[]
     */
    protected $taxa;

    /**
     * @param ReportingDescriptor[] $taxa
     */
    public function addTaxa(array $taxa): void
    {
        foreach ($taxa as $taxonomy) {
            if ($taxonomy instanceof ReportingDescriptor) {
                $this->taxa[] = $taxonomy;
            }
        }
    }
}
