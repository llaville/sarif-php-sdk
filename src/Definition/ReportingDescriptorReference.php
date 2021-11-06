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
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\ToolComponentRef;

use DomainException;

/**
 * Information about how to locate a relevant reporting descriptor.
 *
 * @author Laurent Laville
 */
final class ReportingDescriptorReference extends JsonSerializable
{
    /**
     * The id of the descriptor.
     * @var string
     */
    protected $id;

    /**
     * The index into an array of descriptors in
     * toolComponent.ruleDescriptors, toolComponent.notificationDescriptors, or toolComponent.taxonomyDescriptors,
     * depending on context.
     * @var int
     */
    protected $index;

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
        if ($index < -1) {
            throw new DomainException('"index" minimum value is -1');
        }
        $this->index = $index;
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
