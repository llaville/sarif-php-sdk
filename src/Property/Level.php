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
 * @since Release 1.0.0
 */
trait Level
{
    protected string $level;

    public function setLevel(string $level = 'warning'): void
    {
        $enum = ["none", "note", "warning", "error"];
        if (!in_array($level, $enum)) {
            throw new DomainException('Level "' . $level . '" is not allowed.');
        }
        $this->level = $level;
    }
}
