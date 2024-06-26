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
 * Defines locations of special significance to SARIF consumers.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317627
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class SpecialLocations extends JsonSerializable
{
    /**
     * Provides a suggestion to SARIF consumers to display file paths relative to the specified location.
     */
    use Property\DisplayBase;

    /**
     * Key/value pairs that provide additional information about the special locations.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'displayBase',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
