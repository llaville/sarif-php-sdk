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
 * Information about a rule or notification that can be configured at runtime.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317852
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ReportingConfiguration extends JsonSerializable
{
    /**
     * Specifies whether the report may be produced during the scan.
     */
    use Property\Enabled;

    /**
     * Specifies the failure level for the report.
     */
    use Property\Level;

    /**
     * Specifies the relative priority of the report. Used for analysis output only.
     */
    use Property\Rank;

    /**
     * Contains configuration information specific to a report.
     */
    use Property\ParameterBag;

    /**
     * Key/value pairs that provide additional information about the reporting configuration.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'enabled',
            'level',
            'rank',
            'parameters',
            'properties',
        ];
        parent::__construct($required, $optional);

        $this->setEnabled(true);
        $this->setLevel();
        $this->setRank();
    }
}
