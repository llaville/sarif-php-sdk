<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ToolComponent;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait Policies
{
    /**
     * @var ToolComponent[]
     */
    protected array $policies;

    /**
     * @param ToolComponent[] $policies
     */
    public function setPolicies(array $policies): void
    {
        foreach ($policies as $policy) {
            if ($policy instanceof ToolComponent) {
                $this->policies[] = $policy;
            }
        }
    }
}
