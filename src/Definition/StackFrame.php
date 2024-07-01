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
 * A function call within a stack trace.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317802
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class StackFrame extends JsonSerializable
{
    /**
     * The location to which this stack frame refers.
     */
    use Property\CodeLocation;

    /**
     * The name of the module that contains the code of this stack frame.
     */
    use Property\Module;

    /**
     * The thread identifier of the stack frame.
     */
    use Property\ThreadId;

    /**
     * The parameters of the call that is executing.
     */
    use Property\Parameters;

    /**
     * Key/value pairs that provide additional information about the stack frame.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'location',
            'module',
            'threadId',
            'parameters',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
