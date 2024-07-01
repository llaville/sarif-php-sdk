<?php declare(strict_types=1);

namespace Bartlett\Sarif\Factory;

use Bartlett\Sarif\Builder;
use Bartlett\Sarif\Contract\BuilderFactoryInterface;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
final class BuilderFactory implements BuilderFactoryInterface
{
    public function address(): Builder\Address
    {
        return new Builder\Address();
    }

    public function artifact(): Builder\Artifact
    {
        return new Builder\Artifact();
    }

    public function artifactChange(): Builder\ArtifactChange
    {
        return new Builder\ArtifactChange();
    }

    public function artifactContent(): Builder\ArtifactContent
    {
        return new Builder\ArtifactContent();
    }

    public function artifactLocation(): Builder\ArtifactLocation
    {
        return new Builder\ArtifactLocation();
    }

    public function automationDetails(): Builder\AutomationDetails
    {
        return new Builder\AutomationDetails();
    }

    public function attachment(): Builder\Attachment
    {
        return new Builder\Attachment();
    }

    public function configuration(): Builder\Configuration
    {
        return new Builder\Configuration();
    }

    public function configurationOverride(): Builder\ConfigurationOverride
    {
        return new Builder\ConfigurationOverride();
    }

    public function conversion(): Builder\Conversion
    {
        return new Builder\Conversion();
    }

    public function codeFlow(): Builder\CodeFlow
    {
        return new Builder\CodeFlow();
    }

    public function descriptor(): Builder\Descriptor
    {
        return new Builder\Descriptor();
    }

    public function descriptorReference(): Builder\DescriptorReference
    {
        return new Builder\DescriptorReference();
    }

    public function driver(): Builder\Driver
    {
        return new Builder\Driver();
    }

    public function exception(): Builder\Exception
    {
        return new Builder\Exception();
    }

    public function edge(): Builder\Edge
    {
        return new Builder\Edge();
    }

    public function edgeTraversal(): Builder\EdgeTraversal
    {
        return new Builder\EdgeTraversal();
    }

    public function extension(): Builder\Extension
    {
        return new Builder\Extension();
    }

    public function externalProperties(): Builder\ExternalProperties
    {
        return new Builder\ExternalProperties();
    }

    public function externalPropertyFileReference(): Builder\ExternalPropertyFileReference
    {
        return new Builder\ExternalPropertyFileReference();
    }

    public function externalPropertyFileReferences(): Builder\ExternalPropertyFileReferences
    {
        return new Builder\ExternalPropertyFileReferences();
    }

    public function fix(): Builder\Fix
    {
        return new Builder\Fix();
    }

    public function graph(): Builder\Graph
    {
        return new Builder\Graph();
    }

    public function graphTraversal(): Builder\GraphTraversal
    {
        return new Builder\GraphTraversal();
    }

    public function invocation(): Builder\Invocation
    {
        return new Builder\Invocation();
    }

    public function location(): Builder\Location
    {
        return new Builder\Location();
    }

    public function logicalLocation(): Builder\LogicalLocation
    {
        return new Builder\LogicalLocation();
    }

    public function locationRelationship(): Builder\LocationRelationship
    {
        return new Builder\LocationRelationship();
    }

    public function message(): Builder\Message
    {
        return new Builder\Message();
    }

    public function node(): Builder\Node
    {
        return new Builder\Node();
    }

    public function notification(): Builder\Notification
    {
        return new Builder\Notification();
    }

    public function physicalLocation(): Builder\PhysicalLocation
    {
        return new Builder\PhysicalLocation();
    }

    public function propertyBag(): Builder\PropertyBag
    {
        return new Builder\PropertyBag();
    }

    public function rectangle(): Builder\Rectangle
    {
        return new Builder\Rectangle();
    }

    public function region(): Builder\Region
    {
        return new Builder\Region();
    }

    public function relationship(): Builder\Relationship
    {
        return new Builder\Relationship();
    }

    public function replacement(): Builder\Replacement
    {
        return new Builder\Replacement();
    }

    public function result(): Builder\Result
    {
        return new Builder\Result();
    }

    public function resultProvenance(): Builder\ResultProvenance
    {
        return new Builder\ResultProvenance();
    }

    public function rule(): Builder\Rule
    {
        return new Builder\Rule();
    }

    public function run(): Builder\Run
    {
        return new Builder\Run();
    }

    public function stack(): Builder\Stack
    {
        return new Builder\Stack();
    }

    public function stackFrame(): Builder\StackFrame
    {
        return new Builder\StackFrame();
    }

    public function suppression(): Builder\Suppression
    {
        return new Builder\Suppression();
    }

    public function specialLocations(): Builder\SpecialLocations
    {
        return new Builder\SpecialLocations();
    }

    public function specification(string $version): Builder\Specification
    {
        return new Builder\Specification($version);
    }

    public function threadFlow(): Builder\ThreadFlow
    {
        return new Builder\ThreadFlow();
    }

    public function threadFlowLocation(): Builder\ThreadFlowLocation
    {
        return new Builder\ThreadFlowLocation();
    }

    public function tool(): Builder\Tool
    {
        return new Builder\Tool();
    }

    public function toolComponent(): Builder\ToolComponent
    {
        return new Builder\ToolComponent();
    }

    public function translationMetadata(): Builder\TranslationMetadata
    {
        return new Builder\TranslationMetadata();
    }

    public function versionControlDetails(): Builder\VersionControlDetails
    {
        return new Builder\VersionControlDetails();
    }

    public function webRequest(): Builder\WebRequest
    {
        return new Builder\WebRequest();
    }

    public function webResponse(): Builder\WebResponse
    {
        return new Builder\WebResponse();
    }
}
