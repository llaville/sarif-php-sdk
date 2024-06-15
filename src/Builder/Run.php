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
final class Run extends Declaration
{
    protected Tool $tool;
    protected Definition\Conversion $conversion;
    /**
     * @var Definition\Address[] $addresses
     */
    protected array $addresses;
    /**
     * @var Definition\Artifact[] $artifacts
     */
    protected array $artifacts;
    /**
     * @var Definition\Result[] $results
     */
    protected array $results;
    /**
     * @var Definition\Invocation[] $invocations
     */
    protected array $invocations;
    /**
     * @var Definition\LogicalLocation[] $logicalLocations
     */
    protected array $logicalLocations;
    protected Definition\RunAutomationDetails $automationDetails;
    /**
     * @var Definition\ArtifactLocation[] $originalUriBaseIds
     */
    protected array $originalUriBaseIds;
    protected Definition\SpecialLocations $specialLocations;
    /**
     * @var Definition\VersionControlDetails[] $versionControlProvenance
     */
    protected array $versionControlProvenance;
    /**
     * @var Definition\WebRequest[] $webRequests
     */
    protected array $webRequests;
    /**
     * @var Definition\WebResponse[] $webResponses
     */
    protected array $webResponses;

    protected Definition\ExternalPropertyFileReferences $externalPropertyFileReferences;

    public function externalPropertyFileReferences(ExternalPropertyFileReferences $externalPropertyFileReferences): self
    {
        $this->externalPropertyFileReferences = $externalPropertyFileReferences->build();
        return $this;
    }

    /**
     * Component of an analysis tool or converter, either its driver or an extension, consisting of one or more files.
     */
    public function tool(Tool $tool): self
    {
        $this->tool = $tool;
        return $this;
    }

    public function conversion(Conversion $conversion): self
    {
        $this->conversion = $conversion->build();
        return $this;
    }

    public function automationDetails(AutomationDetails $automationDetails): self
    {
        $this->automationDetails = $automationDetails->build();
        return $this;
    }

    public function specialLocations(SpecialLocations $specialLocations): self
    {
        $this->specialLocations = $specialLocations->build();
        return $this;
    }

    public function addAddress(Address $address): self
    {
        $this->addresses[] = $address->build();
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

    public function addLogicalLocation(LogicalLocation $location): self
    {
        $this->logicalLocations[] = $location->build();
        return $this;
    }

    public function addResult(Result $result): self
    {
        $this->results[] = $result->build();
        return $this;
    }

    public function addOriginalUriBaseId(string $key, ArtifactLocation $value): self
    {
        $this->originalUriBaseIds[$key] = $value->build();
        return $this;
    }

    public function addVersionControlProvenance(VersionControlDetails $versionControlDetails): self
    {
        $this->versionControlProvenance[] = $versionControlDetails->build();
        return $this;
    }

    public function addWebRequest(WebRequest $request): self
    {
        $this->webRequests[] = $request->build();
        return $this;
    }

    public function addWebResponse(WebResponse $response): self
    {
        $this->webResponses[] = $response->build();
        return $this;
    }

    /**
     * Builds a valued instance of Run definition.
     */
    public function build(): Definition\Run
    {
        $tool = $this->tool->build();
        $run = new Definition\Run($tool);
        $this->populate($run);
        $run->addAdditionalProperties($this->originalUriBaseIds ?? []);
        $run->addVersionControlDetails($this->versionControlProvenance ?? []);
        return $run;
    }
}
