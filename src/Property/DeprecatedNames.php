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
 * @since Release 1.0.0
 */
trait DeprecatedNames
{
    /**
     * @var string[]
     */
    protected array $deprecatedNames;

    /**
     * @param string[] $deprecatedNames
     */
    public function addDeprecatedNames(array $deprecatedNames): void
    {
        array_push($this->deprecatedNames, $deprecatedNames);
    }
}
