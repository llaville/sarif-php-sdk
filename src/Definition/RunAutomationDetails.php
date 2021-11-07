<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\CorrelationGuid;
use Bartlett\Sarif\Property\Description;
use Bartlett\Sarif\Property\Guid;
use Bartlett\Sarif\Property\Id;
use Bartlett\Sarif\Property\Properties;

/**
 * Information that describes a run's identity and role within an engineering system process.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317523
 * @author Laurent Laville
 */
final class RunAutomationDetails extends JsonSerializable
{
    /**
     * A description of the identity and role played within the engineering system by this object's containing run object.
     */
    use Description;

    /**
     * A hierarchical string that uniquely identifies this object's containing run object.
     */
    use Id;

    /**
     * A stable, unique identifer for this object's containing run object in the form of a GUID.
     */
    use Guid;

    /**
     * A stable, unique identifier for the equivalence class of runs to which this object's containing run object
     * belongs in the form of a GUID.
     */
    use CorrelationGuid;

    /**
     * Key/value pairs that provide additional information about the run automation details.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'description',
            'id',
            'guid',
            'correlationGuid',
            'properties',
        ];
    }
}
