<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use DomainException;
use function in_array;

/**
 * @author Laurent Laville
 */
trait BaselineState
{
    /**
     * @var string
     */
    protected $baselineState;

    /**
     * @param string $baselineState
     */
    public function setBaselineState(string $baselineState): void
    {
        $enum = ["new", "unchanged", "updated", "absent"];
        if (!in_array($baselineState, $enum)) {
            throw new DomainException($baselineState . ' "baselineState" is not allowed.');
        }
        $this->baselineState = $baselineState;
    }
}
