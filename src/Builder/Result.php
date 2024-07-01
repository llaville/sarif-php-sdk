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
final class Result extends Declaration
{
    protected Definition\Message $message;
    protected string $ruleId;
    protected int $ruleIndex;
    protected string $level;
    /**
     * @var Definition\Location[] $relatedLocations
     */
    protected array $relatedLocations;
    /**
     * @var Definition\Fix[] $fixes
     */
    protected array $fixes;
    /**
     * @var Definition\Attachment[] $attachments
     */
    protected array $attachments;
    /**
     * @var Definition\CodeFlow[] $codeFlows
     */
    protected array $codeFlows;
    /**
     * @var Definition\Graph[] $graphs
     */
    protected array $graphs;
    /**
     * @var Definition\GraphTraversal[] $graphTraversals
     */
    protected array $graphTraversals;
    /**
     * @var Definition\Location[] $locations
     */
    protected array $locations;
    /**
     * @var Definition\Suppression[] $suppressions
     */
    protected array $suppressions;
    protected string $baselineState;
    protected Definition\ResultProvenance $provenance;
    /**
     * @var \Bartlett\Sarif\Definition\Stack[] $stacks
     */
    protected array $stacks;

    public function message(Message $message): self
    {
        $this->message = $message->build();
        return $this;
    }

    public function ruleId(string $id): self
    {
        $this->ruleId = $id;
        return $this;
    }

    public function ruleIndex(int $index): self
    {
        $this->ruleIndex = $index;
        return $this;
    }

    public function level(string $level): self
    {
        $this->level = $level;
        return $this;
    }

    public function baselineState(string $baselineState): self
    {
        $this->baselineState = $baselineState;
        return $this;
    }

    public function provenance(ResultProvenance $provenance): self
    {
        $this->provenance = $provenance->build();
        return $this;
    }

    public function addRelatedLocation(Location $location): self
    {
        $this->relatedLocations[] = $location->build();
        return $this;
    }

    public function addFix(Fix $fix): self
    {
        $this->fixes[] = $fix->build();
        return $this;
    }

    public function addAttachment(Attachment $attachment): self
    {
        $this->attachments[] = $attachment->build();
        return $this;
    }

    public function addCodeFlow(CodeFlow $codeFlow): self
    {
        $this->codeFlows[] = $codeFlow->build();
        return $this;
    }

    public function addGraph(Graph $graph): self
    {
        $this->graphs[] = $graph->build();
        return $this;
    }

    public function addGraphTraversal(GraphTraversal $graphTraversal): self
    {
        $this->graphTraversals[] = $graphTraversal->build();
        return $this;
    }

    public function addLocation(Location $location): self
    {
        $this->locations[] = $location->build();
        return $this;
    }

    public function addSuppression(Suppression $suppression): self
    {
        $this->suppressions[] = $suppression->build();
        return $this;
    }

    public function addStack(Stack $stack): self
    {
        $this->stacks[] = $stack->build();
        return $this;
    }

    /**
     * Builds a valued instance of Result definition.
     */
    public function build(): Definition\Result
    {
        $result = new Definition\Result();
        $this->populate($result);
        return $result;
    }
}
