<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Body;
use Bartlett\Sarif\Property\Headers;
use Bartlett\Sarif\Property\Index;
use Bartlett\Sarif\Property\Method;
use Bartlett\Sarif\Property\Parameters;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Protocol;
use Bartlett\Sarif\Property\RequestParameters;
use Bartlett\Sarif\Property\Target;
use Bartlett\Sarif\Property\Version;

/**
 * Describes an HTTP request.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317808
 * @author Laurent Laville
 */
final class WebRequest extends JsonSerializable
{
    /**
     * The index within the run.webRequests array of the request object associated with this result.
     */
    use Index;

    /**
     * The request protocol. Example: 'http'.
     */
    use Protocol;

    /**
     * The request version. Example: '1.1'.
     */
    use Version;

    /**
     * The target of the request.
     */
    use Target;

    /**
     * The HTTP method. Well-known values are
     * 'GET', 'PUT', 'POST', 'DELETE', 'PATCH', 'HEAD', 'OPTIONS', 'TRACE', 'CONNECT'.
     */
    use Method;

    /**
     * Headers:           The request headers.
     * RequestParameters: The request parameters.
     */
    use Headers, RequestParameters {
        Headers::addAdditionalProperties as addAdditionalPropertiesHeaders;
        RequestParameters::addAdditionalProperties insteadof Headers;
    }

    /**
     * The body of the request.
     */
    use Body;

    /**
     * Key/value pairs that provide additional information about the request.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'index',
            'protocol',
            'version',
            'target',
            'method',
            'headers',
            'parameters',
            'body',
            'properties',
        ];
    }
}
