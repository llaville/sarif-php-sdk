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
 * Information about how to locate a relevant reporting descriptor.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317862
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ReportingDescriptorReference extends JsonSerializable
{
    /**
     * The id of the descriptor.
     */
    use Property\Id;

    /**
     * The index into an array of descriptors in
     * toolComponent.ruleDescriptors, toolComponent.notificationDescriptors, or toolComponent.taxonomyDescriptors,
     * depending on context.
     */
    use Property\Index;

    /**
     * A guid that uniquely identifies the descriptor.
     */
    use Property\Guid;

    /**
     * A reference used to locate the toolComponent associated with the descriptor.
     */
    use Property\ToolComponentRef;

    /**
     * Key/value pairs that provide additional information about the reporting descriptor reference.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'index',
            'id',
            'guid',
            'toolComponent',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
