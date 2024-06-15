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
