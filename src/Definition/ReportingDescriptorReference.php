<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Guid;
use Bartlett\Sarif\Property\Id;
use Bartlett\Sarif\Property\Index;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\ToolComponentRef;

/**
 * Information about how to locate a relevant reporting descriptor.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317862
 * @author Laurent Laville
 */
final class ReportingDescriptorReference extends JsonSerializable
{
    /**
     * The id of the descriptor.
     */
    use Id;

    /**
     * The index into an array of descriptors in
     * toolComponent.ruleDescriptors, toolComponent.notificationDescriptors, or toolComponent.taxonomyDescriptors,
     * depending on context.
     */
    use Index;

    /**
     * A guid that uniquely identifies the descriptor.
     */
    use Guid;

    /**
     * A reference used to locate the toolComponent associated with the descriptor.
     */
    use ToolComponentRef;

    /**
     * Key/value pairs that provide additional information about the reporting descriptor reference.
     */
    use Properties;

    /**
     * @param int $index
     * @param string $id
     * @param string $guid
     */
    public function __construct(int $index = -1, string $id = '', string $guid = '')
    {
        $this->setIndex($index);
        $this->id = $id;
        $this->guid = $guid;

        $this->required = [];
        $this->optional = [
            'index',
            'id',
            'guid',
            'toolComponent',
            'properties',
        ];
    }
}
