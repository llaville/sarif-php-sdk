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
 * Encapsulates a message intended to be read by the end user.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317459
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Message extends JsonSerializable
{
    /**
     * A plain text message string.
     */
    use Property\Text;

    /**
     * A Markdown message string.
     */
    use Property\Markdown;

    /**
     * The identifier for this message.
     */
    use Property\Id;

    /**
     * An array of strings to substitute into the message string.
     */
    use Property\Arguments;

    /**
     * Key/value pairs that provide additional information about the message.
     */
    use Property\Properties;

    public function __construct(string $text = '', string $id = '')
    {
        $this->id = $id;
        $this->text = $text;

        $required = [];
        $optional = [
            'text',
            'markdown',
            'id',
            'arguments',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
