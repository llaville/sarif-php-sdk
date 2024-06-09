<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;
use Bartlett\Sarif\Internal;

use LogicException;
use ReflectionClass;
use ReflectionException;
use ReflectionObject;
use function get_class;
use function is_numeric;
use function method_exists;
use function ucfirst;

abstract class Declaration implements Internal\BuilderDeclarationInterface
{
    protected Definition\PropertyBag $properties;

    public function setProperties(array $properties): self
    {
        if (!empty($properties)) {
            $this->properties = new Definition\PropertyBag($properties);
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

        try {
            $reflectionClass = new ReflectionClass(Internal\JsonSerializable::class);
            $reflectionProperty = $reflectionClass->getProperty('required');
            $requirements = $reflectionProperty->getValue($object);
            /**
             * @var string[] $requirements
             */
            foreach ($requirements as $requirement) {
                if (!isset($this->$requirement)) {
                    throw new LogicException('"' . $requirement . '" is required, but not defined.');
                }
            }

            $reflectionProperty = $reflectionClass->getProperty('optional');
            $attributes = $reflectionProperty->getValue($object);
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
