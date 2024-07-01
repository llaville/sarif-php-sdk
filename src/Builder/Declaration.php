<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Contract\BuilderDeclarationInterface;
use Bartlett\Sarif\Definition;
use Bartlett\Sarif\Internal;

use LogicException;
use ReflectionClass;
use ReflectionException;
use ReflectionObject;
use function array_push;
use function get_class;
use function is_numeric;
use function method_exists;
use function ucfirst;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
abstract class Declaration implements BuilderDeclarationInterface
{
    protected Definition\PropertyBag $properties;

    public function setProperties(array $properties): self
    {
        if (!empty($properties)) {
            $this->properties = new Definition\PropertyBag();
            $this->properties->addProperties($properties);
        }
        return $this;
    }

    abstract public function build(): Internal\JsonSerializable;

    protected function populate(object $object): void
    {
        $reflectionObject = new ReflectionObject($object);

        if (!$reflectionObject->isSubclassOf(Internal\JsonSerializable::class)) {
            throw new LogicException(get_class($object) . ' must inherit from ' . Internal\JsonSerializable::class);
        }

        $attributes = [];

        try {
            $reflectionClass = new ReflectionClass(Internal\JsonSerializable::class);

            $reflectionProperty = $reflectionClass->getProperty('required');
            $required = (array) $reflectionProperty->getValue($object);
            array_push($attributes, ...$required);

            $reflectionProperty = $reflectionClass->getProperty('optional');
            $optional = (array) $reflectionProperty->getValue($object);
            array_push($attributes, ...$optional);
        } catch (ReflectionException $exception) {
            $attributes = [];
        }

        /**
         * @var string[] $attributes
         */
        foreach ($attributes as $attribute) {
            if (isset($this->$attribute) && (is_numeric($this->$attribute) || !empty($this->$attribute))) {
                $method = 'set' . ucfirst($attribute);
                if (method_exists($object, $method)) {
                    $object->$method($this->$attribute);
                    continue;
                }
                $method = 'add' . ucfirst($attribute);
                if (method_exists($object, $method)) {
                    $object->$method($this->$attribute);
                }
            }
        }
    }
}
