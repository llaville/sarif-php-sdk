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
trait ColumnKind
{
    protected string $columnKind;

    public function setColumnKind(string $columnKind): void
    {
        $enum = ["utf16CodeUnits", "unicodeCodePoints"];
        if (!in_array($columnKind, $enum)) {
            throw new DomainException($columnKind . ' "columnKind" is not allowed.');
        }
        $this->columnKind = $columnKind;
    }
}
