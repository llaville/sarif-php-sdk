<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\AsOfTimeUtc;
use Bartlett\Sarif\Property\Branch;
use Bartlett\Sarif\Property\MappedTo;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\RepositoryUri;
use Bartlett\Sarif\Property\RevisionId;
use Bartlett\Sarif\Property\RevisionTag;

/**
 * Specifies the information necessary to retrieve a desired revision from a version control system.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317602
 * @author Laurent Laville
 */
final class VersionControlDetails extends JsonSerializable
{
    /**
     * The absolute URI of the repository.
     */
    use RepositoryUri;

    /**
     * A string that uniquely and permanently identifies the revision within the repository.
     */
    use RevisionId;

    /**
     * The name of a branch containing the revision.
     */
    use Branch;

    /**
     * A tag that has been applied to the revision.
     */
    use RevisionTag;

    /**
     * A Coordinated Universal Time (UTC) date and time that can be used
     * to synchronize an enlistment to the state of the repository at that time.
     */
    use AsOfTimeUtc;

    /**
     * The location in the local file system to which the root of the repository was mapped at the time of the analysis.
     */
    use MappedTo;

    /**
     * Key/value pairs that provide additional information about the version control details.
     */
    use Properties;

    /**
     * @param string $repositoryUri
     */
    public function __construct(string $repositoryUri)
    {
        $this->repositoryUri = $repositoryUri;

        $this->required = ['repositoryUri'];
        $this->optional = [
            'revisionId',
            'branch',
            'revisionTag',
            'asOfTimeUtc',
            'mappedTo',
            'properties',
        ];
    }
}
