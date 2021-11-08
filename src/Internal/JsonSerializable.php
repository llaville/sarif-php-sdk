<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Internal;

use LogicException;
use function is_numeric;

/**
 * @author Laurent Laville
 */
abstract class JsonSerializable implements \JsonSerializable
{
    /**
     * Declares all properties required.
     * @var string[]
     */
    protected $required;

    /**
     * Declares all other optional properties.
     * @var string[]
     */
    protected $optional;

    /**
     * Checks all properties that are mandatory.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $properties = [];
        foreach ($this->required as $requirement) {
            if (!isset($this->$requirement)) {
                throw new LogicException('"' . $requirement . '" is required, but not defined.');
            }
            $properties[$requirement] = $this->$requirement;
        }
        foreach ($this->optional as $optional) {
            if (isset($this->$optional) && (is_numeric($this->$optional) || !empty($this->$optional))) {
                $properties[$optional] = $this->$optional;
            }
        }
        return $properties;
    }
}
