<?php declare(strict_types=1);

namespace Bartlett\Sarif\Factory;

use Bartlett\Sarif\Builder\Address;
use Bartlett\Sarif\Builder\Artifact;
use Bartlett\Sarif\Builder\ArtifactChange;
use Bartlett\Sarif\Builder\ArtifactContent;
use Bartlett\Sarif\Builder\ArtifactLocation;
use Bartlett\Sarif\Builder\Attachment;
use Bartlett\Sarif\Builder\AutomationDetails;
use Bartlett\Sarif\Builder\CodeFlow;
use Bartlett\Sarif\Builder\Configuration;
use Bartlett\Sarif\Builder\ConfigurationOverride;
use Bartlett\Sarif\Builder\Conversion;
use Bartlett\Sarif\Builder\Descriptor;
use Bartlett\Sarif\Builder\DescriptorReference;
use Bartlett\Sarif\Builder\Driver;
use Bartlett\Sarif\Builder\Edge;
use Bartlett\Sarif\Builder\EdgeTraversal;
use Bartlett\Sarif\Builder\Exception;
use Bartlett\Sarif\Builder\Extension;
use Bartlett\Sarif\Builder\ExternalProperties;
use Bartlett\Sarif\Builder\ExternalPropertyFileReference;
use Bartlett\Sarif\Builder\ExternalPropertyFileReferences;
use Bartlett\Sarif\Builder\Fix;
use Bartlett\Sarif\Builder\Graph;
use Bartlett\Sarif\Builder\GraphTraversal;
use Bartlett\Sarif\Builder\Invocation;
use Bartlett\Sarif\Builder\Location;
use Bartlett\Sarif\Builder\LocationRelationship;
use Bartlett\Sarif\Builder\LogicalLocation;
use Bartlett\Sarif\Builder\Node;
use Bartlett\Sarif\Builder\Notification;
use Bartlett\Sarif\Builder\PhysicalLocation;
use Bartlett\Sarif\Builder\PropertyBag;
use Bartlett\Sarif\Builder\Rectangle;
use Bartlett\Sarif\Builder\Region;
use Bartlett\Sarif\Builder\Relationship;
use Bartlett\Sarif\Builder\Replacement;
use Bartlett\Sarif\Builder\Result;
use Bartlett\Sarif\Builder\ResultProvenance;
use Bartlett\Sarif\Builder\Rule;
use Bartlett\Sarif\Builder\Run;
use Bartlett\Sarif\Builder\SpecialLocations;
use Bartlett\Sarif\Builder\Specification;
use Bartlett\Sarif\Builder\Stack;
use Bartlett\Sarif\Builder\StackFrame;
use Bartlett\Sarif\Builder\Suppression;
use Bartlett\Sarif\Builder\ThreadFlow;
use Bartlett\Sarif\Builder\ThreadFlowLocation;
use Bartlett\Sarif\Builder\Tool;
use Bartlett\Sarif\Builder\ToolComponent;
use Bartlett\Sarif\Builder\TranslationMetadata;
use Bartlett\Sarif\Builder\VersionControlDetails;
use Bartlett\Sarif\Builder\WebRequest;
use Bartlett\Sarif\Builder\WebResponse;
use Bartlett\Sarif\Internal\BuilderFactoryInterface;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
final class BuilderFactory implements BuilderFactoryInterface
{
    public function address(): Address
    {
        return new Address();
    }

    public function artifact(): Artifact
    {
        return new Artifact();
    }

    public function artifactChange(): ArtifactChange
    {
        return new ArtifactChange();
    }

    public function artifactContent(): ArtifactContent
    {
        return new ArtifactContent();
    }

    public function artifactLocation(): ArtifactLocation
    {
        return new ArtifactLocation();
    }

    public function automationDetails(): AutomationDetails
    {
        return new AutomationDetails();
    }

    public function attachment(): Attachment
    {
        return new Attachment();
    }

    public function configuration(): Configuration
    {
        return new Configuration();
    }

    public function configurationOverride(): ConfigurationOverride
    {
        return new ConfigurationOverride();
    }

    public function conversion(): Conversion
    {
        return new Conversion();
    }

    public function codeFlow(): CodeFlow
    {
        return new CodeFlow();
    }

    public function descriptor(): Descriptor
    {
        return new Descriptor();
    }

    public function descriptorReference(): DescriptorReference
    {
        return new DescriptorReference();
    }

    public function driver(): Driver
    {
        return new Driver();
    }

    public function exception(): Exception
    {
        return new Exception();
    }

    public function edge(): Edge
    {
        return new Edge();
    }

    public function edgeTraversal(): EdgeTraversal
    {
        return new EdgeTraversal();
    }

    public function extension(): Extension
    {
        return new Extension();
    }

    public function externalProperties(): ExternalProperties
    {
        return new ExternalProperties();
    }

    public function externalPropertyFileReference(): ExternalPropertyFileReference
    {
        return new ExternalPropertyFileReference();
    }

    public function externalPropertyFileReferences(): ExternalPropertyFileReferences
    {
        return new ExternalPropertyFileReferences();
    }

    public function fix(): Fix
    {
        return new Fix();
    }

    public function graph(): Graph
    {
        return new Graph();
    }

    public function graphTraversal(): GraphTraversal
    {
        return new GraphTraversal();
    }

    public function invocation(): Invocation
    {
        return new Invocation();
    }

    public function location(): Location
    {
        return new Location();
    }

    public function logicalLocation(): LogicalLocation
    {
        return new LogicalLocation();
    }

    public function locationRelationship(): LocationRelationship
    {
        return new LocationRelationship();
    }

    public function node(): Node
    {
        return new Node();
    }

    public function notification(): Notification
    {
        return new Notification();
    }

    public function physicalLocation(): PhysicalLocation
    {
        return new PhysicalLocation();
    }

    public function propertyBag(): PropertyBag
    {
        return new PropertyBag();
    }

    public function rectangle(): Rectangle
    {
        return new Rectangle();
    }

    public function region(): Region
    {
        return new Region();
    }

    public function relationship(): Relationship
    {
        return new Relationship();
    }

    public function replacement(): Replacement
    {
        return new Replacement();
    }

    public function result(string $messageText, string $messageId = '', array $arguments = []): Result
    {
        return new Result($messageText, $messageId, $arguments);
    }

    public function resultProvenance(): ResultProvenance
    {
        return new ResultProvenance();
    }

    public function rule(): Rule
    {
        return new Rule();
    }

    public function run(): Run
    {
        return new Run();
    }

    public function stack(): Stack
    {
        return new Stack();
    }

    public function stackFrame(): StackFrame
    {
        return new StackFrame();
    }

    public function suppression(): Suppression
    {
        return new Suppression();
    }

    public function specialLocations(): SpecialLocations
    {
        return new SpecialLocations();
    }

    public function specification(string $version): Specification
    {
        return new Specification($version);
    }

    public function threadFlow(): ThreadFlow
    {
        return new ThreadFlow();
    }

    public function threadFlowLocation(): ThreadFlowLocation
    {
        return new ThreadFlowLocation();
    }

    public function tool(): Tool
    {
        return new Tool();
    }

    public function toolComponent(): ToolComponent
    {
        return new ToolComponent();
    }

    public function translationMetadata(): TranslationMetadata
    {
        return new TranslationMetadata();
    }

    public function versionControlDetails(): VersionControlDetails
    {
        return new VersionControlDetails();
    }

    public function webRequest(): WebRequest
    {
        return new WebRequest();
    }

    public function webResponse(): WebResponse
    {
        return new WebResponse();
    }
}
