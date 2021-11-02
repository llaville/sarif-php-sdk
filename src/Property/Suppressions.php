<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Suppression;

/**
 * @author Laurent Laville
 */
trait Suppressions
{
    /**
     * @var Suppression[]
     */
    protected $suppressions;

    /**
     * @param Suppression[] $suppressions
     */
    public function addSuppressions(array $suppressions): void
    {
        foreach ($suppressions as $suppression) {
            if ($suppression instanceof Suppression) {
                $this->suppressions[] = $suppression;
            }
        }
    }
}
