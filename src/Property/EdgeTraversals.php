<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\EdgeTraversal;

/**
 * @author Laurent Laville
 */
trait EdgeTraversals
{
    /**
     * @var EdgeTraversal[]
     */
    protected $edgeTraversals;

    /**
     * @param EdgeTraversal[] $edgeTraversals
     */
    public function addEdgeTraversals(array $edgeTraversals): void
    {
        foreach ($edgeTraversals as $edgeTraversal) {
            if ($edgeTraversal instanceof EdgeTraversal) {
                $this->edgeTraversals[] = $edgeTraversal;
            }
        }
    }
}
