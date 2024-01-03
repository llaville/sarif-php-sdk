<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Fix;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait Fixes
{
    /**
     * @var Fix[]
     */
    protected array $fixes;

    /**
     * @param Fix[] $fixes
     */
    public function addFixes(array $fixes): void
    {
        foreach ($fixes as $fix) {
            if ($fix instanceof Fix) {
                $this->fixes[] = $fix;
            }
        }
    }
}
