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
 * Describes the response to an HTTP request.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317818
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class WebResponse extends JsonSerializable
{
    /**
     * The index within the run.webResponses array of the response object associated with this result.
     */
    use Property\Index;

    /**
     * The response protocol. Example: 'http'.
     */
    use Property\Protocol;

    /**
     * The response version. Example: '1.1'.
     */
    use Property\Version;

    /**
     * The response status code. Example: 451.
     */
    use Property\StatusCode;

    /**
     * The response reason. Example: 'Not found'.
     */
    use Property\ReasonPhrase;

    /**
     * The response headers.
     */
    use Property\Headers;

    /**
     * The body of the response.
     */
    use Property\Body;

    /**
     * Specifies whether a response was received from the server.
     */
    use Property\NoResponseReceived;

    /**
     * Key/value pairs that provide additional information about the response.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
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
        parent::__construct($required, $optional);

        $this->setNoResponseReceived(false);
    }
}
