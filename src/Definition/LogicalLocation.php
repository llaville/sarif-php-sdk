<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property;

/**
 * A logical location of a construct that produced a result.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317719
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class LogicalLocation extends JsonSerializable
{
    /**
     * Identifies the construct in which the result occurred.
     * For example, this property might contain the name of a class or a method.
     */
    use Property\Name;

    /**
     * The index within the logical locations array.
     */
    use Property\Index;

    /**
     * The human-readable fully qualified name of the logical location.
     */
    use Property\FullyQualifiedName;

    /**
     * The machine-readable name for the logical location, such as a mangled function name provided by a C++ compiler
     * that encodes calling convention, return type and other details along with the function name.
     */
    use Property\DecoratedName;

    /**
     * Identifies the index of the immediate parent of the construct in which the result was detected.
     * For example, this property might point to a logical location that represents the namespace that holds a type.
     */
    use Property\ParentIndex;

    /**
     * The type of construct this logical location component refers to.
     * Should be one of
     * 'function', 'member', 'module', 'namespace', 'parameter', 'resource', 'returnType', 'type', 'variable',
     * 'object', 'array', 'property', 'value', 'element', 'text', 'attribute', 'comment', 'declaration',
     * 'dtd' or 'processingInstruction', if any of those accurately describe the construct.
     */
    use Property\LocationKind;

    /**
     * Key/value pairs that provide additional information about the logical location.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'name',
            'index',
            'fullyQualifiedName',
            'decoratedName',
            'parentIndex',
            'kind',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
