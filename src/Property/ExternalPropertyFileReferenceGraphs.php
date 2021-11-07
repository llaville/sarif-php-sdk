<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ExternalPropertyFileReference;

/**
 * @author Laurent Laville
 */
trait ExternalPropertyFileReferenceGraphs
{
    /**
     * @var ExternalPropertyFileReference[]
     */
    protected $graphs;

    /**
     * @param ExternalPropertyFileReference[] $graphs
     */
    public function addGraphs(array $graphs): void
    {
        foreach ($graphs as $graph) {
            if ($graph instanceof ExternalPropertyFileReference) {
                $this->graphs[] = $graph;
            }
        }
    }
}
