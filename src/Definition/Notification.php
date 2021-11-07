<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\AssociatedRule;
use Bartlett\Sarif\Property\Descriptor;
use Bartlett\Sarif\Property\Level;
use Bartlett\Sarif\Property\Locations;
use Bartlett\Sarif\Property\MessageString;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\RuntimeException;
use Bartlett\Sarif\Property\ThreadId;
use Bartlett\Sarif\Property\TimeUtc;

/**
 * Describes a condition relevant to the tool itself, as opposed to being relevant to a target being analyzed by the tool.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317894
 * @author Laurent Laville
 */
final class Notification extends JsonSerializable
{
    /**
     * The locations relevant to this notification.
     */
    use Locations;

    /**
     * A message that describes the condition that was encountered.
     */
    use MessageString;

    /**
     * A value specifying the severity level of the notification.
     */
    use Level;

    /**
     * The thread identifier of the code that generated the notification.
     */
    use ThreadId;

    /**
     * The Coordinated Universal Time (UTC) date and time at which the analysis tool generated the notification.
     */
    use TimeUtc;

    /**
     * The runtime exception, if any, relevant to this notification.
     */
    use RuntimeException;

    /**
     * A reference used to locate the descriptor relevant to this notification.
     */
    use Descriptor;

    /**
     * A reference used to locate the rule descriptor associated with this notification.
     */
    use AssociatedRule;

    /**
     * Key/value pairs that provide additional information about the notification.
     */
    use Properties;

    /**
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;

        $this->required = ['message'];
        $this->optional = [
            'locations',
            'level',
            'threadId',
            'timeUtc',
            'exception',
            'descriptor',
            'associateRule',
            'properties',
        ];
    }
}
