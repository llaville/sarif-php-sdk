<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

/**
 * @author Laurent Laville
 */
trait RedactionTokens
{
    /**
     * @var string[]
     */
    protected $redactionTokens;

    /**
     * @param string[] $redactionTokens
     */
    public function addRedactionTokens(array $redactionTokens): void
    {
        foreach ($redactionTokens as $redactionToken) {
            if (\is_string($redactionToken)) {
                $this->redactionTokens[] = $redactionToken;
            }
        }
    }
}
