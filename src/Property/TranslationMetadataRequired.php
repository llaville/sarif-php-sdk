<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\TranslationMetadata;

/**
 * @author Laurent Laville
 */
trait TranslationMetadataRequired
{
    /**
     * @var TranslationMetadata
     */
    protected $translationMetadata;

    /**
     * @param TranslationMetadata $translationMetadata
     */
    public function setTranslationMetadata(TranslationMetadata $translationMetadata): void
    {
        $this->translationMetadata = $translationMetadata;
    }
}
