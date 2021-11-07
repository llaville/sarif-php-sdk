<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Arguments;
use Bartlett\Sarif\Property\Id;
use Bartlett\Sarif\Property\Markdown;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Text;

use DomainException;

/**
 * Encapsulates a message intended to be read by the end user.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317459
 * @author Laurent Laville
 */
final class Message extends JsonSerializable
{
    /**
     * A plain text message string.
     */
    use Text;

    /**
     * A Markdown message string.
     */
    use Markdown;

    /**
     * The identifier for this message.
     */
    use Id;

    /**
     * An array of strings to substitute into the message string.
     */
    use Arguments;

    /**
     * Key/value pairs that provide additional information about the message.
     */
    use Properties;

    /**
     * @param string $text
     * @param string $id
     */
    public function __construct(string $text = '', string $id = '')
    {
        // Any of "id", "text" are required
        if (empty($id) && empty($text)) {
            throw new DomainException('Either "id" or "text" are required. Nothing provided.');
        }

        $this->id = $id;
        $this->text = $text;

        $this->required = [];
        $this->optional = [
            'text',
            'markdown',
            'id',
            'arguments',
            'properties',
        ];
    }
}
