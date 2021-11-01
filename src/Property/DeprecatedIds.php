<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use function array_push;

/**
 * @author Laurent Laville
 */
trait DeprecatedIds
{
    /**
     * @var string[]
     */
    protected $deprecatedIds;

    /**
     * @param string[] $deprecatedIds
     */
    public function addDeprecatedIds(array $deprecatedIds): void
    {
        array_push($this->deprecatedIds, $deprecatedIds);
    }
}
