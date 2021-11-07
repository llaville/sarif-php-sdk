<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\CallStack;
use Bartlett\Sarif\Property\InnerExceptions;
use Bartlett\Sarif\Property\KindException;
use Bartlett\Sarif\Property\MessageStringNative;
use Bartlett\Sarif\Property\Properties;

/**
 * An exception object describes a runtime exception encountered during the execution of an analysis tool.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317904
 * @author Laurent Laville
 */
final class Exception extends JsonSerializable
{
    /**
     * A string that identifies the kind of exception,
     * for example, the fully qualified type name of an object that was thrown, or the symbolic name of a signal.
     */
    use KindException;

    /**
     * A message that describes the exception.
     */
    use MessageStringNative;

    /**
     * The sequence of function calls leading to the exception.
     */
    use CallStack;

    /**
     * An array of exception objects each of which is considered a cause of this exception.
     */
    use InnerExceptions;

    /**
     * Key/value pairs that provide additional information about the exception.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'kind',
            'message',
            'stack',
            'innerExceptions',
            'properties',
        ];
    }
}
