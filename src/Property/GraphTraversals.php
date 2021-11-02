<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\GraphTraversal;

/**
 * @author Laurent Laville
 */
trait GraphTraversals
{
    /**
     * @var GraphTraversal[]
     */
    protected $graphTraversals;

    /**
     * @param GraphTraversal[] $graphTraversals
     */
    public function addGraphTraversals(array $graphTraversals): void
    {
        foreach ($graphTraversals as $graphTraversal) {
            if ($graphTraversal instanceof GraphTraversal) {
                $this->graphTraversals[] = $graphTraversal;
            }
        }
    }
}
