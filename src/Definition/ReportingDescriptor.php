<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\DefaultConfiguration;
use Bartlett\Sarif\Property\DeprecatedGuids;
use Bartlett\Sarif\Property\DeprecatedIds;
use Bartlett\Sarif\Property\DeprecatedNames;
use Bartlett\Sarif\Property\FullDescription;
use Bartlett\Sarif\Property\Guid;
use Bartlett\Sarif\Property\Help;
use Bartlett\Sarif\Property\HelpUri;
use Bartlett\Sarif\Property\Id;
use Bartlett\Sarif\Property\MessageStrings;
use Bartlett\Sarif\Property\Name;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Relationships;
use Bartlett\Sarif\Property\ShortDescription;

/**
 * Metadata that describes a specific report produced by the tool,
 * as part of the analysis it provides or its runtime reporting.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317836
 * @author Laurent Laville
 */
final class ReportingDescriptor extends JsonSerializable
{
    /**
     * A stable, opaque identifier for the report.
     */
    use Id;

    /**
     * An array of stable, opaque identifiers by which this report was known in some previous version of the analysis tool.
     */
    use DeprecatedIds;

    /**
     * A unique identifier for the reporting descriptor in the form of a GUID.
     */
    use Guid;

    /**
     * An array of unique identifies in the form of a GUID by which this report was known
     * in some previous version of the analysis tool.
     */
    use DeprecatedGuids;

    /**
     * A report identifier that is understandable to an end user.
     */
    use Name;

    /**
     * An array of readable identifiers by which this report was known in some previous version of the analysis tool.
     */
    use DeprecatedNames;

    /**
     * A concise description of the report.
     * Should be a single sentence that is understandable when visible space is limited to a single line of text.
     */
    use ShortDescription;

    /**
     * A description of the report.
     * Should, as far as possible, provide details sufficient to enable resolution of any problem indicated by the result.
     */
    use FullDescription;

    /**
     * A set of name/value pairs with arbitrary names.
     * Each value is a multiformatMessageString object, which holds message string in plain text and (optionally) Markdown format.
     * The strings can include placeholders, which can be used to construct a message
     * in combination with an arbitrary number of additional string arguments.
     */
    use MessageStrings;

    /**
     * Default reporting configuration information.
     */
    use DefaultConfiguration;

    /**
     * A URI where the primary documentation for the report can be found.
     */
    use HelpUri;

    /**
     * Provides the primary documentation for the report, useful when there is no online documentation.
     */
    use Help;

    /**
     * An array of objects that describe relationships between this reporting descriptor and others.
     */
    use Relationships;

    /**
     * Key/value pairs that provide additional information about the report.
     */
    use Properties;

    public function __construct(string $id)
    {
        $this->id = $id;
        $this->deprecatedIds = [];
        $this->deprecatedGuids = [];
        $this->messageStrings = [];
        $this->relationships = [];

        $this->required = ['id'];
        $this->optional = [
            'deprecatedIds',
            'guid',
            'deprecatedGuids',
            'name',
            'deprecatedNames',
            'shortDescription',
            'fullDescription',
            'messageStrings',
            'defaultConfiguration',
            'helpUri',
            'help',
            'relationships',
            'properties',
        ];
    }
}
