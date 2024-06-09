<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Conversion extends Declaration
{
    protected Definition\Tool $tool;
    protected Definition\Invocation $invocation;
    /**
     * @var Definition\ArtifactLocation[] $analysisToolLogFiles
     */
    protected array $analysisToolLogFiles;

    public function tool(Tool $tool): self
    {
        $this->tool = $tool->build();
        return $this;
    }

    public function invocation(Invocation $invocation): self
    {
        $this->invocation = $invocation->build();
        return $this;
    }

    public function addAnalysisToolLogFile(ArtifactLocation $artifactLocation): self
    {
        $this->analysisToolLogFiles[] = $artifactLocation->build();
        return $this;
    }

    /**
     * Builds a valued instance of Conversion definition.
     */
    public function build(): Definition\Conversion
    {
        $conversion = new Definition\Conversion($this->tool);
        $this->populate($conversion);
        return $conversion;
    }
}
