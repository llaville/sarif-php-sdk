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
 * Describes a condition relevant to the tool itself, as opposed to being relevant to a target being analyzed by the tool.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317894
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Notification extends JsonSerializable
{
    /**
     * The locations relevant to this notification.
     */
    use Property\Locations;

    /**
     * A message that describes the condition that was encountered.
     */
    use Property\MessageString;

    /**
     * A value specifying the severity level of the notification.
     */
    use Property\Level;

    /**
     * The thread identifier of the code that generated the notification.
     */
    use Property\ThreadId;

    /**
     * The Coordinated Universal Time (UTC) date and time at which the analysis tool generated the notification.
     */
    use Property\TimeUtc;

    /**
     * The runtime exception, if any, relevant to this notification.
     */
    use Property\RuntimeException;

    /**
     * A reference used to locate the descriptor relevant to this notification.
     */
    use Property\Descriptor;

    /**
     * A reference used to locate the rule descriptor associated with this notification.
     */
    use Property\AssociatedRule;

    /**
     * Key/value pairs that provide additional information about the notification.
     */
    use Property\Properties;

    public function __construct(Message $message)
    {
        $this->message = $message;

        $required = ['message'];
        $optional = [
            'locations',
            'level',
            'threadId',
            'timeUtc',
            'exception',
            'descriptor',
            'associateRule',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
