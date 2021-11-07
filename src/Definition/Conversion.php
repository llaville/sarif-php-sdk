<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\AnalysisToolLogFiles;
use Bartlett\Sarif\Property\InvocationConverter;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\ToolPipeline;

/**
 * Describes how a converter transformed the output of a static analysis tool
 * from the analysis tool's native output format into the SARIF format.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317597
 * @author Laurent Laville
 */
final class Conversion extends JsonSerializable
{
    /**
     * A tool object that describes the converter.
     */
    use ToolPipeline;

    /**
     * An invocation object that describes the invocation of the converter.
     */
    use InvocationConverter;

    /**
     * The locations of the analysis tool's per-run log files.
     */
    use AnalysisToolLogFiles;

    /**
     * Key/value pairs that provide additional information about the conversion.
     */
    use Properties;

    /**
     * @param Tool $tool
     */
    public function __construct(Tool $tool)
    {
        $this->tool = $tool;

        $this->required = ['tool'];
        $this->optional = [
            'invocation',
            'analysisToolLogFiles',
            'properties',
        ];
    }
}
