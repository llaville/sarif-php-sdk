<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\MessageString;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\ThreadFlows;

/**
 * A set of threadFlows which together describe a pattern of code execution relevant to detecting a result.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317740
 * @author Laurent Laville
 */
final class CodeFlow extends JsonSerializable
{
    /**
     * A message relevant to the code flow.
     */
    use MessageString;

    /**
     * An array of one or more unique threadFlow objects,
     * each of which describes the progress of a program through a thread of execution.
     */
    use ThreadFlows;

    /**
     * Key/value pairs that provide additional information about the code flow.
     */
    use Properties;

    /**
     * @param ThreadFlow[] $threadFlows
     */
    public function __construct(array $threadFlows)
    {
        $this->addThreadFlows($threadFlows);

        $this->required = ['threadFlows'];
        $this->optional = [
            'message',
            'properties',
        ];
    }
}
