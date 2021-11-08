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
trait RunGuid
{
    /**
     * @var string
     */
    protected $runGuid;

    /**
     * @param string $runGuid
     */
    public function setRunGuid(string $runGuid): void
    {
        $pattern = "^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$";
        if (preg_match_all("/$pattern/", $runGuid) === false) {
            throw new DomainException('"runGuid" does not satisfy pattern "' . $pattern . '"');
        }
        $this->runGuid = $runGuid;
    }
}
