<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ToolComponentReference;

/**
 * @author Laurent Laville
 */
trait SupportedTaxonomies
{
    /**
     * @var ToolComponentReference[]
     */
    protected $supportedTaxonomies;

    /**
     * @param ToolComponentReference[] $supportedTaxonomies
     */
    public function addSupportedTaxonomies(array $supportedTaxonomies): void
    {
        foreach ($supportedTaxonomies as $supportedTaxonomy) {
            if ($supportedTaxonomy instanceof ToolComponentReference) {
                $this->supportedTaxonomies[] = $supportedTaxonomy;
            }
        }
    }
}
