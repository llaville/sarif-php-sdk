<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
final class Rule extends Declaration
{
    protected string $id;
    protected string $name;
    protected Definition\MultiformatMessageString $shortDescription;
    protected string $helpUri;
    /**
     * @var string[] $deprecatedIds
     */
    protected array $deprecatedIds;
    /**
     * @var array<string, Definition\MultiformatMessageString> $messageStrings
     */
    protected array $messageStrings;
    protected Definition\ReportingConfiguration $defaultConfiguration;
    /**
     * @var Definition\ReportingDescriptorRelationship[] $relationships
     */
    protected array $relationships;

    public function defaultConfiguration(Configuration $defaultConfiguration): self
    {
        $this->defaultConfiguration = $defaultConfiguration->build();
        return $this;
    }

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function shortDescription(string $description): self
    {
        $this->shortDescription = new Definition\MultiformatMessageString($description);
        return $this;
    }

    public function helpUri(string $uri): self
    {
        $this->helpUri = $uri;
        return $this;
    }

    public function deprecatedIds(string $id): self
    {
        $this->deprecatedIds[] = $id;
        return $this;
    }

    public function addMessageString(string $key, string $value): self
    {
        $this->messageStrings[$key] = new Definition\MultiformatMessageString($value);
        return $this;
    }

    public function addRelationship(Relationship $relationship): self
    {
        $this->relationships[] = $relationship->build();
        return $this;
    }

    /**
     * Builds a valued instance of ReportingDescriptor definition.
     */
    public function build(): Definition\ReportingDescriptor
    {
        $rule = new Definition\ReportingDescriptor($this->id);
        $this->populate($rule);
        return $rule;
    }
}
