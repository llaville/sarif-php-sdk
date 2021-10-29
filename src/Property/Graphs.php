<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Graph;

/**
 * @author Laurent Laville
 */
trait Graphs
{
    /**
     * @var Graph[]
     */
    protected $graphs;

    /**
     * @param Graph[] $graphs
     */
    public function addGraphs(array $graphs): void
    {
        foreach ($graphs as $graph) {
            if ($graph instanceof Graph) {
                $this->graphs[] = $graph;
            }
        }
    }
}
