<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Addresses;
use Bartlett\Sarif\Property\Artifacts;
use Bartlett\Sarif\Property\ConversionProcess;
use Bartlett\Sarif\Property\Driver;
use Bartlett\Sarif\Property\Extensions;
use Bartlett\Sarif\Property\ExternalizedProperties;
use Bartlett\Sarif\Property\Graphs;
use Bartlett\Sarif\Property\Guid;
use Bartlett\Sarif\Property\Invocations;
use Bartlett\Sarif\Property\LogicalLocations;
use Bartlett\Sarif\Property\Policies;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Results;
use Bartlett\Sarif\Property\RunGuid;
use Bartlett\Sarif\Property\Schema;
use Bartlett\Sarif\Property\Taxonomies;
use Bartlett\Sarif\Property\ThreadFlowLocations;
use Bartlett\Sarif\Property\Translations;
use Bartlett\Sarif\Property\Version;
use Bartlett\Sarif\Property\WebRequests;
use Bartlett\Sarif\Property\WebResponses;

use function sprintf;

/**
 * The top-level element of an external property file.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317913
 * @author Laurent Laville
 */
final class ExternalProperties extends JsonSerializable
{
    /**
     * The URI of the JSON schema corresponding to the version.
     */
    use Schema;

    /**
     * The SARIF format version of this external properties object.
     */
    use Version;

    /**
     * A stable, unique identifier for this external properties object, in the form of a GUID.
     */
    use Guid;

    /**
     * A stable, unique identifier for the run associated with this external properties object, in the form of a GUID.
     */
    use RunGuid;

    /**
     * A conversion object that will be merged with a separate run.
     */
    use ConversionProcess;

    /**
     * An array of graph objects that will be merged with a separate run.
     */
    use Graphs;

    /**
     * Key/value pairs that provide additional information that will be merged with a separate run.
     */
    use ExternalizedProperties;

    /**
     * An array of artifact objects that will be merged with a separate run.
     */
    use Artifacts;

    /**
     * Describes the invocation of the analysis tool that will be merged with a separate run.
     */
    use Invocations;

    /**
     * An array of logical locations such as namespaces, types or functions that will be merged with a separate run.
     */
    use LogicalLocations;

    /**
     * An array of threadFlowLocation objects that will be merged with a separate run.
     */
    use ThreadFlowLocations;

    /**
     * An array of result objects that will be merged with a separate run.
     */
    use Results;

    /**
     * Tool taxonomies that will be merged with a separate run.
     */
    use Taxonomies;

    /**
     * The analysis tool object that will be merged with a separate run.
     */
    use Driver;

    /**
     * Tool extensions that will be merged with a separate run.
     */
    use Extensions;

    /**
     * Tool policies that will be merged with a separate run.
     */
    use Policies;

    /**
     * Tool translations that will be merged with a separate run.
     */
    use Translations;

    /**
     * Addresses that will be merged with a separate run.
     */
    use Addresses;

    /**
     * Requests that will be merged with a separate run.
     */
    use WebRequests;

    /**
     * Responses that will be merged with a separate run.
     */
    use WebResponses;

    /**
     * Key/value pairs that provide additional information about the external properties.
     */
    use Properties;

    /**
     * @param string $version
     * @param string $schemaUri
     */
    public function __construct(string $version = '2.1.0', string $schemaUri = '')
    {
        $this->version = $version;
        if (empty($schemaUri)) {
            $this->schema = sprintf('https://json.schemastore.org/sarif-%s.json', $version);
        } else {
            $this->schema = $schemaUri;
        }

        $this->required = [];
        $this->optional = [
            'schema',
            'version',
            'guid',
            'runGuid',
            'conversion',
            'graphs',
            'externalizedProperties',
            'artifacts',
            'invocations',
            'logicalLocations',
            'threadFlowLocations',
            'results',
            'taxonomies',
            'driver',
            'extensions',
            'policies',
            'translations',
            'addresses',
            'webRequests',
            'webResponses',
            'properties'
        ];
    }
}
