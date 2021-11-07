<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ExternalPropertyFileReference;

/**
 * @author Laurent Laville
 */
trait ExternalPropertyFileReferenceTaxonomies
{
    /**
     * @var ExternalPropertyFileReference[]
     */
    protected $taxonomies;

    /**
     * @param ExternalPropertyFileReference[] $taxonomies
     */
    public function addTaxonomies(array $taxonomies): void
    {
        foreach ($taxonomies as $taxonomy) {
            if ($taxonomy instanceof ExternalPropertyFileReference) {
                $this->taxonomies[] = $taxonomy;
            }
        }
    }
}
