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
 * Contains information about how and when a result was detected.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317828
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ResultProvenance extends JsonSerializable
{
    /**
     * The Coordinated Universal Time (UTC) date and time at which the result was first detected.
     * See "Date/time properties" in the SARIF spec for the required format.
     */
    use Property\FirstDetectionTimeUtc;

    /**
     * The Coordinated Universal Time (UTC) date and time at which the result was most recently detected.
     * See "Date/time properties" in the SARIF spec for the required format.
     */
    use Property\LastDetectionTimeUtc;

    /**
     * A GUID-valued string equal to the automationDetails.guid property of the run
     * in which the result was first detected.
     */
    use Property\FirstDetectionRunGuid;

    /**
     * A GUID-valued string equal to the automationDetails.guid property of the run
     * in which the result was most recently detected.
     */
    use Property\LastDetectionRunGuid;

    /**
     * The index within the run.invocations array of the invocation object
     * which describes the tool invocation that detected the result.
     */
    use Property\InvocationIndex;

    /**
     * An array of physicalLocation objects which specify the portions of an analysis tool's output
     * that a converter transformed into the result.
     */
    use Property\ConversionSources;

    /**
     * Key/value pairs that provide additional information about the result.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'firstDetectionTimeUtc',
            'lastDetectionTimeUtc',
            'firstDetectionRunGuid',
            'lastDetectionRunGuid',
            'invocationIndex',
            'conversionSources',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
