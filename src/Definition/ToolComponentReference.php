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
 * Identifies a particular toolComponent object, either the driver or an extension.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317875
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ToolComponentReference extends JsonSerializable
{
    /**
     * The 'name' property of the referenced toolComponent.
     */
    use Property\Name;

    /**
     * An index into the referenced toolComponent in tool.extensions.
     */
    use Property\Index;

    /**
     * The 'guid' property of the referenced toolComponent.
     */
    use Property\Guid;

    /**
     * Key/value pairs that provide additional information about the toolComponentReference.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'name',
            'index',
            'guid',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
