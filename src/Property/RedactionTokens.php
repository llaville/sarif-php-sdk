<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use function is_string;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait RedactionTokens
{
    /**
     * @var string[]
     */
    protected array $redactionTokens;

    /**
     * @param string[] $redactionTokens
     */
    public function addRedactionTokens(array $redactionTokens): void
    {
        foreach ($redactionTokens as $redactionToken) {
            if (is_string($redactionToken)) {
                $this->redactionTokens[] = $redactionToken;
            }
        }
    }
}
