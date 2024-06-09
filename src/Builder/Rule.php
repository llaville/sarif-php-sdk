<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

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
