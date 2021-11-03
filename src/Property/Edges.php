<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Edge;

/**
 * @author Laurent Laville
 */
trait Edges
{
    /**
     * @var Edge[]
     */
    protected $edges;

    /**
     * @param Edge[] $edges
     */
    public function addEdges(array $edges): void
    {
        foreach ($edges as $edge) {
            if ($edge instanceof Edge) {
                $this->edges[] = $edge;
            }
        }
    }
}
