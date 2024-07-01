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

use function sprintf;

/**
 * The top-level element of an external property file.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317913
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ExternalProperties extends JsonSerializable
{
    /**
     * The URI of the JSON schema corresponding to the version.
     */
    use Property\Schema;

    /**
     * The SARIF format version of this external properties object.
     */
    use Property\Version;

    /**
     * A stable, unique identifier for this external properties object, in the form of a GUID.
     */
    use Property\Guid;

    /**
     * A stable, unique identifier for the run associated with this external properties object, in the form of a GUID.
     */
    use Property\RunGuid;

    /**
     * A conversion object that will be merged with a separate run.
     */
    use Property\ConversionProcess;

    /**
     * An array of graph objects that will be merged with a separate run.
     */
    use Property\Graphs;

    /**
     * Key/value pairs that provide additional information that will be merged with a separate run.
     */
    use Property\ExternalizedProperties;

    /**
     * An array of artifact objects that will be merged with a separate run.
     */
    use Property\Artifacts;

    /**
     * Describes the invocation of the analysis tool that will be merged with a separate run.
     */
    use Property\Invocations;

    /**
     * An array of logical locations such as namespaces, types or functions that will be merged with a separate run.
     */
    use Property\LogicalLocations;

    /**
     * An array of threadFlowLocation objects that will be merged with a separate run.
     */
    use Property\ThreadFlowLocations;

    /**
     * An array of result objects that will be merged with a separate run.
     */
    use Property\Results;

    /**
     * Tool taxonomies that will be merged with a separate run.
     */
    use Property\Taxonomies;

    /**
     * The analysis tool object that will be merged with a separate run.
     */
    use Property\Driver;

    /**
     * Tool extensions that will be merged with a separate run.
     */
    use Property\Extensions;

    /**
     * Tool policies that will be merged with a separate run.
     */
    use Property\Policies;

    /**
     * Tool translations that will be merged with a separate run.
     */
    use Property\Translations;

    /**
     * Addresses that will be merged with a separate run.
     */
    use Property\Addresses;

    /**
     * Requests that will be merged with a separate run.
     */
    use Property\WebRequests;

    /**
     * Responses that will be merged with a separate run.
     */
    use Property\WebResponses;

    /**
     * Key/value pairs that provide additional information about the external properties.
     */
    use Property\Properties;

    public function __construct()
    {
        $this->version = '2.1.0';
        $this->schema = sprintf('https://json.schemastore.org/sarif-%s.json', $this->version);

        $required = [];
        $optional = [
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
        parent::__construct($required, $optional);
    }
}
