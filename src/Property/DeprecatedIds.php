<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use function is_string;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait DeprecatedIds
{
    /**
     * @var string[]
     */
    protected array $deprecatedIds;

    /**
     * @param string[] $deprecatedIds
     */
    public function addDeprecatedIds(array $deprecatedIds): void
    {
        foreach ($deprecatedIds as $deprecatedId) {
            if (is_string($deprecatedId)) {
                $this->deprecatedIds[] = $deprecatedId;
            }
        }
    }
}
