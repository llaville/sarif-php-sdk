<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\AbsoluteAddress;
use Bartlett\Sarif\Property\AddressKind;
use Bartlett\Sarif\Property\FullyQualifiedName;
use Bartlett\Sarif\Property\Index;
use Bartlett\Sarif\Property\Length;
use Bartlett\Sarif\Property\Name;
use Bartlett\Sarif\Property\OffsetFromParent;
use Bartlett\Sarif\Property\ParentIndex;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\RelativeAddress;

/**
 * A physical or virtual address, or a range of addresses, in an 'addressable region' (memory or a binary file).
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317705
 * @author Laurent Laville
 */
final class Address extends JsonSerializable
{
    /**
     * The address expressed as a byte offset from the start of the addressable region.
     */
    use AbsoluteAddress;

    /**
     * The address expressed as a byte offset from the absolute address of the top-most parent object.
     */
    use RelativeAddress;

    /**
     * The number of bytes in this range of addresses.
     */
    use Length;

    /**
     * An open-ended string that identifies the address kind.
     * 'data', 'function', 'header','instruction', 'module', 'page', 'section', 'segment', 'stack', 'stackFrame',
     * 'table' are well-known values.
     */
    use AddressKind;

    /**
     * A name that is associated with the address, e.g., '.text'.
     */
    use Name;

    /**
     * A human-readable fully qualified name that is associated with the address.
     */
    use FullyQualifiedName;

    /**
     * The byte offset of this address from the absolute or relative address of the parent object.
     */
    use OffsetFromParent;

    /**
     * The index within run.addresses of the cached object for this address.
     */
    use Index;

    /**
     * The index within run.addresses of the parent object.
     */
    use ParentIndex;

    /**
     * Key/value pairs that provide additional information about the address.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'absoluteAddress',
            'relativeAddress',
            'length',
            'kind',
            'name',
            'fullyQualifiedName',
            'offsetFromParent',
            'index',
            'parentIndex',
            'properties',
        ];
    }
}
