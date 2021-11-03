<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Node;

/**
 * @author Laurent Laville
 */
trait Children
{
    /**
     * @var Node[]
     */
    protected $children;

    /**
     * @param Node[] $children
     */
    public function addChildren(array $children): void
    {
        foreach ($children as $child) {
            if ($child instanceof Node) {
                $this->children[] = $child;
            }
        }
    }
}
