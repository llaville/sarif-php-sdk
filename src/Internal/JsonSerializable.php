<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Internal;

use LogicException;
use function get_class;
use function is_numeric;
use function sprintf;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
abstract class JsonSerializable implements \JsonSerializable
{
    /**
     * Declares all properties required.
     * @var string[]
     */
    private array $required;

    /**
     * Declares all other optional properties.
     * @var string[]
     */
    private array $optional;

    /**
     * @param string[] $required
     * @param string[] $optional
     */
    public function __construct(array $required = [], array $optional = [])
    {
        $this->required = $required;
        $this->optional = $optional;
    }

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
                throw new LogicException(
                    sprintf('"%s.%s" is required, but not defined.', get_class($this), $requirement)
                );
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
