<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;

use Bartlett\Sarif\Property\Enabled;
use Bartlett\Sarif\Property\Level;
use Bartlett\Sarif\Property\ParameterBag;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Rank;

/**
 * Information about a rule or notification that can be configured at runtime.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317852
 * @author Laurent Laville
 */
final class ReportingConfiguration extends JsonSerializable
{
    /**
     * Specifies whether the report may be produced during the scan.
     */
    use Enabled;

    /**
     * Specifies the failure level for the report.
     */
    use Level;

    /**
     * Specifies the relative priority of the report. Used for analysis output only.
     */
    use Rank;

    /**
     * Contains configuration information specific to a report.
     */
    use ParameterBag;

    /**
     * Key/value pairs that provide additional information about the reporting configuration.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'enabled',
            'level',
            'rank',
            'parameters',
            'properties',
        ];

        $this->setEnabled();
        $this->setLevel();
        $this->setRank();
    }
}
