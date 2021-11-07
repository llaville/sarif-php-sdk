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
use Bartlett\Sarif\Property\NoResponseReceived;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Protocol;
use Bartlett\Sarif\Property\ReasonPhrase;
use Bartlett\Sarif\Property\StatusCode;
use Bartlett\Sarif\Property\Version;

/**
 * Describes the response to an HTTP request.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317818
 * @author Laurent Laville
 */
final class WebResponse extends JsonSerializable
{
    /**
     * The index within the run.webResponses array of the response object associated with this result.
     */
    use Index;

    /**
     * The response protocol. Example: 'http'.
     */
    use Protocol;

    /**
     * The response version. Example: '1.1'.
     */
    use Version;

    /**
     * The response status code. Example: 451.
     */
    use StatusCode;

    /**
     * The response reason. Example: 'Not found'.
     */
    use ReasonPhrase;

    /**
     * The response headers.
     */
    use Headers;

    /**
     * The body of the response.
     */
    use Body;

    /**
     * Specifies whether a response was received from the server.
     */
    use NoResponseReceived;

    /**
     * Key/value pairs that provide additional information about the response.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'index',
            'protocol',
            'version',
            'statusCode',
            'reasonPhrase',
            'headers',
            'body',
            'noResponseReceived',
            'properties',
        ];
    }
}
