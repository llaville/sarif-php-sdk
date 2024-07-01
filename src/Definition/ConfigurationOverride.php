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
 * Information about how a specific rule or notification was reconfigured at runtime.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317858
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ConfigurationOverride extends JsonSerializable
{
    /**
     * Specifies how the rule or notification was configured during the scan.
     */
    use Property\ConfigurationAtRuntime;

    /**
     * A reference used to locate the descriptor whose configuration was overridden.
     */
    use Property\Descriptor;

    /**
     * Key/value pairs that provide additional information about the configuration override.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'configuration',
            'descriptor',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
