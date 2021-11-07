<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\DownloadUri;
use Bartlett\Sarif\Property\FullDescription;
use Bartlett\Sarif\Property\FullName;
use Bartlett\Sarif\Property\InformationUri;
use Bartlett\Sarif\Property\Name;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\ShortDescription;

/**
 * Provides additional metadata related to translation.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317630
 * @author Laurent Laville
 */
final class TranslationMetadata extends JsonSerializable
{
    /**
     * The name associated with the translation metadata.
     */
    use Name;

    /**
     * The full name associated with the translation metadata.
     */
    use FullName;

    /**
     * A brief description of the translation metadata.
     */
    use ShortDescription;

    /**
     * A comprehensive description of the translation metadata.
     */
    use FullDescription;

    /**
     * The absolute URI from which the translation metadata can be downloaded.
     */
    use DownloadUri;

    /**
     * The absolute URI from which information related to the translation metadata can be downloaded.
     */
    use InformationUri;

    /**
     * Key/value pairs that provide additional information about the translation metadata.
     */
    use Properties;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;

        $this->required = ['name'];
        $this->optional = [
            'fullName',
            'shortDescription',
            'fullDescription',
            'downloadUri',
            'informationUri',
            'properties',
        ];
    }
}
