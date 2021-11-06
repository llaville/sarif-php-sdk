<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Replacement;

/**
 * @author Laurent Laville
 */
trait Replacements
{
    /**
     * @var Replacement[]
     */
    protected $replacements;

    /**
     * @param Replacement[] $replacements
     */
    public function addReplacements(array $replacements): void
    {
        foreach ($replacements as $replacement) {
            if ($replacement instanceof Replacement) {
                $this->replacements[] = $replacement;
            }
        }
    }
}
