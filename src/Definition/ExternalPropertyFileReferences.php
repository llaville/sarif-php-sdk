<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceAddresses;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceConversion;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceDriver;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceExtensions;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceInvocations;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceLogicalLocations;
use Bartlett\Sarif\Property\ExternalPropertyFileReferencePolicies;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceProperties;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceArtifacts;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceGraphs;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceRequests;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceResponses;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceResults;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceTaxonomies;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceThreadFlowLocations;
use Bartlett\Sarif\Property\ExternalPropertyFileReferenceTranslations;
use Bartlett\Sarif\Property\Properties;

/**
 * An externalPropertyFileReferences object contains information that enables a SARIF consumer
 * to locate the external property files that contain the values of all externalized properties associated with theRun.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317513
 * @author Laurent Laville
 */
final class ExternalPropertyFileReferences extends JsonSerializable
{
    /**
     * An external property file containing a run.conversion object to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceConversion;

    /**
     * An array of external property files containing a run.graphs object to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceGraphs;

    /**
     * An external property file containing a run.properties object to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceProperties;

    /**
     * An array of external property files containing run.artifacts arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceArtifacts;

    /**
     * An array of external property files containing run.invocations arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceInvocations;

    /**
     * An array of external property files containing run.logicalLocations arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceLogicalLocations;

    /**
     * An array of external property files containing run.threadFlowLocations arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceThreadFlowLocations;

    /**
     * An array of external property files containing run.results arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceResults;

    /**
     * An array of external property files containing run.taxonomies arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceTaxonomies;

    /**
     * An array of external property files containing run.addresses arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceAddresses;

    /**
     * An external property file containing a run.driver object to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceDriver;

    /**
     * An array of external property files containing run.extensions arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceExtensions;

    /**
     * An array of external property files containing run.policies arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferencePolicies;

    /**
     * An array of external property files containing run.translations arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceTranslations;

    /**
     * An array of external property files containing run.requests arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceRequests;

    /**
     * An array of external property files containing run.responses arrays to be merged with the root log file.
     */
    use ExternalPropertyFileReferenceResponses;

    /**
     * Key/value pairs that provide additional information about the external property files.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
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
    }
}
