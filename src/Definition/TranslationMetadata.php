<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property;

/**
 * Provides additional metadata related to translation.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317630
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class TranslationMetadata extends JsonSerializable
{
    /**
     * The name associated with the translation metadata.
     */
    use Property\Name;

    /**
     * The full name associated with the translation metadata.
     */
    use Property\FullName;

    /**
     * A brief description of the translation metadata.
     */
    use Property\ShortDescription;

    /**
     * A comprehensive description of the translation metadata.
     */
    use Property\FullDescription;

    /**
     * The absolute URI from which the translation metadata can be downloaded.
     */
    use Property\DownloadUri;

    /**
     * The absolute URI from which information related to the translation metadata can be downloaded.
     */
    use Property\InformationUri;

    /**
     * Key/value pairs that provide additional information about the translation metadata.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = ['name'];
        $optional = [
            'fullName',
            'shortDescription',
            'fullDescription',
            'downloadUri',
            'informationUri',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
