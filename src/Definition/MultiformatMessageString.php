<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Markdown;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Text;

/**
 * A message string or message format string rendered in multiple formats.
 *
 * @author Laurent Laville
 */
final class MultiformatMessageString extends JsonSerializable
{
    /**
     * A plain text message string or format string.
     */
    use Text;

    /**
     * A Markdown message string or format string.
     */
    use Markdown;

    /**
     * Key/value pairs that provide additional information about the message.
     */
    use Properties;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;

        $this->required = ['text'];
        $this->optional = [
            'markdown',
            'properties',
        ];
    }
}
