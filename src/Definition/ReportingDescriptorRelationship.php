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
 * Information about the relation of one reporting descriptor to another.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317870
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ReportingDescriptorRelationship extends JsonSerializable
{
    /**
     * A reference to the related reporting descriptor.
     */
    use Property\ReportingDescriptorTarget;

    /**
     * A set of distinct strings that categorize the relationship.
     * Well-known kinds include
     * 'canPrecede', 'canFollow', 'willPrecede', 'willFollow', 'superset', 'subset', 'equal', 'disjoint', 'relevant',
     * and 'incomparable'.
     */
    use Property\RelationshipKinds;

    /**
     * A description of the reporting descriptor relationship.
     */
    use Property\Description;

    /**
     * Key/value pairs that provide additional information about the reporting descriptor reference.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = ['target'];
        $optional = [
            'kinds',
            'description',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
