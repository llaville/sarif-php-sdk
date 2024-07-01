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
 * An externalPropertyFileReferences object contains information that enables a SARIF consumer
 * to locate the external property files that contain the values of all externalized properties associated with theRun.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317513
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ExternalPropertyFileReferences extends JsonSerializable
{
    /**
     * An external property file containing a run.conversion object to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceConversion;

    /**
     * An array of external property files containing a run.graphs object to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceGraphs;

    /**
     * An external property file containing a run.properties object to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceProperties;

    /**
     * An array of external property files containing run.artifacts arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceArtifacts;

    /**
     * An array of external property files containing run.invocations arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceInvocations;

    /**
     * An array of external property files containing run.logicalLocations arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceLogicalLocations;

    /**
     * An array of external property files containing run.threadFlowLocations arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceThreadFlowLocations;

    /**
     * An array of external property files containing run.results arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceResults;

    /**
     * An array of external property files containing run.taxonomies arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceTaxonomies;

    /**
     * An array of external property files containing run.addresses arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceAddresses;

    /**
     * An external property file containing a run.driver object to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceDriver;

    /**
     * An array of external property files containing run.extensions arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceExtensions;

    /**
     * An array of external property files containing run.policies arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferencePolicies;

    /**
     * An array of external property files containing run.translations arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceTranslations;

    /**
     * An array of external property files containing run.requests arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceRequests;

    /**
     * An array of external property files containing run.responses arrays to be merged with the root log file.
     */
    use Property\ExternalPropertyFileReferenceResponses;

    /**
     * Key/value pairs that provide additional information about the external property files.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'conversion',
            'graphs',
            'externalizedProperties',
            'artifacts',
            'invocations',
            'logicalLocations',
            'threadFlowLocations',
            'results',
            'taxonomies',
            'addresses',
            'driver',
            'extensions',
            'policies',
            'translations',
            'webRequests',
            'webResponses',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
