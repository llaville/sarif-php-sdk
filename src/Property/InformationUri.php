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
trait InformationUri
{
    /**
     * The absolute URI at which information about this version of the tool component can be found.
     * @var string
     */
    protected $informationUri;

    /**
     * @param string $informationUri
     */
    public function setInformationUri(string $informationUri): void
    {
        $this->informationUri = $informationUri;
    }
}
