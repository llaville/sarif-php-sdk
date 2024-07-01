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
 * The analysis tool that was run.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317529
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Tool extends JsonSerializable
{
    /**
     * The analysis tool that was run.
     */
    use Property\Driver;

    /**
     * Tool extensions that contributed to or reconfigured the analysis tool that was run.
     */
    use Property\Extensions;

    /**
     * Key/value pairs that provide additional information about the tool.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = ['driver'];
        $optional = [
            'extensions',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
