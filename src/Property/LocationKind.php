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
trait LocationKind
{
    /**
     * @var string
     */
    protected $kind;

    /**
     * @param string $kind
     */
    public function setKind(string $kind): void
    {
        $enum = [
            'function',
            'member',
            'module',
            'namespace',
            'parameter',
            'resource',
            'returnType',
            'type',
            'variable',
            'object',
            'array',
            'property',
            'value',
            'element',
            'text',
            'attribute',
            'comment',
            'declaration',
            'dtd',
            'processingInstruction',
        ];
        if (!in_array($kind, $enum)) {
            throw new DomainException($kind . ' "kind" is not allowed.');
        }
        $this->kind = $kind;
    }
}
