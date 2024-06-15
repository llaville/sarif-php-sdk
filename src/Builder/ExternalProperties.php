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
final class ExternalProperties extends Declaration
{
    protected string $schema;
    protected string $version;
    protected string $guid;
    protected string $runGuid;
    protected Definition\Conversion $conversion;
    /**
     * @var Definition\Graph[] $graphs
     */
    protected array $graphs;
    protected Definition\PropertyBag $externalizedProperties;
    /**
     * @var Definition\Artifact[] $artifacts
     */
    protected array $artifacts;
    /**
     * @var Definition\Invocation[] $invocations
     */
    protected array $invocations;
    /**
     * @var Definition\LogicalLocation[] $logicalLocations
     */
    protected array $logicalLocations;
    /**
     * @var Definition\ThreadFlowLocation[] $threadFlowLocations
     */
    protected array $threadFlowLocations;
    /**
     * @var Definition\Result[] $results
     */
    protected array $results;
    /**
     * @var Definition\ToolComponentReference[] $taxonomies
     */
    protected array $taxonomies;

    public function schema(string $schemaUri): self
    {
        $this->schema = $schemaUri;
        return $this;
    }

    public function version(string $schemaVersion): self
    {
        $this->version = $schemaVersion;
        return $this;
    }

    public function guid(string $guid): self
    {
        $this->guid = $guid;
        return $this;
    }

    public function runGuid(string $guid): self
    {
        $this->runGuid = $guid;
        return $this;
    }

    public function conversion(Conversion $conversion): self
    {
        $this->conversion = $conversion->build();
        return $this;
    }

    public function addGraph(Graph $graph): self
    {
        $this->graphs[] = $graph->build();
        return $this;
    }

    public function externalizedProperties(PropertyBag $propertyBag): self
    {
        $this->externalizedProperties = $propertyBag->build();
        return $this;
    }

    public function addArtifact(Artifact $artifact): self
    {
        $this->artifacts[] = $artifact->build();
        return $this;
    }

    public function addInvocation(Invocation $invocation): self
    {
        $this->invocations[] = $invocation->build();
        return $this;
    }

    public function addLogicalLocation(LogicalLocation $logicalLocation): self
    {
        $this->logicalLocations[] = $logicalLocation->build();
        return $this;
    }

    public function addThreadFlowLocation(ThreadFlowLocation $threadFlowLocation): self
    {
        $this->threadFlowLocations[] = $threadFlowLocation->build();
        return $this;
    }

    public function addResult(Result $result): self
    {
        $this->results[] = $result->build();
        return $this;
    }

    public function addTaxonomy(ToolComponent $taxonomy): self
    {
        $this->taxonomies[] = $taxonomy->build();
        return $this;
    }

    /**
     * Builds a valued instance of ExternalProperties definition.
     */
    public function build(): Definition\ExternalProperties
    {
        $externalProperties = new Definition\ExternalProperties();
        $this->populate($externalProperties);
        return $externalProperties;
    }
}
