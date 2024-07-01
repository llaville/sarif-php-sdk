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
 * Describes an HTTP request.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317808
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class WebRequest extends JsonSerializable
{
    /**
     * The index within the run.webRequests array of the request object associated with this result.
     */
    use Property\Index;

    /**
     * The request protocol. Example: 'http'.
     */
    use Property\Protocol;

    /**
     * The request version. Example: '1.1'.
     */
    use Property\Version;

    /**
     * The target of the request.
     */
    use Property\Target;

    /**
     * The HTTP method. Well-known values are
     * 'GET', 'PUT', 'POST', 'DELETE', 'PATCH', 'HEAD', 'OPTIONS', 'TRACE', 'CONNECT'.
     */
    use Property\Method;

    /**
     * Headers:           The request headers.
     * RequestParameters: The request parameters.
     */
    use Property\Headers, Property\RequestParameters {
        Property\Headers::addAdditionalProperties as addAdditionalPropertiesHeaders;
        Property\RequestParameters::addAdditionalProperties insteadof Property\Headers;
    }

    /**
     * The body of the request.
     */
    use Property\Body;

    /**
     * Key/value pairs that provide additional information about the request.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
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
        parent::__construct($required, $optional);
    }
}
