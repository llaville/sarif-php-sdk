<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Contract;

use Bartlett\Sarif\Internal\JsonSerializable;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
interface BuilderDeclarationInterface
{
    /**
     * @param array<string, mixed> $properties
     */
    public function setProperties(array $properties): BuilderDeclarationInterface;

    public function build(): JsonSerializable;
}
