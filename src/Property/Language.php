<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use DomainException;
use function preg_match_all;

/**
 * @author Laurent Laville
 */
trait Language
{
    /**
     * @var string
     */
    protected $language;

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $pattern = "^[a-zA-Z]{2}|^[a-zA-Z]{2}-[a-zA-Z]{2}]?$";
        if (preg_match_all("/$pattern/", $language) === false) {
            throw new DomainException('"language" does not satisfy pattern "' . $pattern . '"');
        }
        $this->language = $language;
    }
}
