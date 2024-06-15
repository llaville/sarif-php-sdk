<?php declare(strict_types=1);

namespace Bartlett\Sarif\Contract;

use Bartlett\Sarif\Builder;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
interface BuilderFactoryInterface
{
    /**
     * Creates an address builder.
     */
    public function address(): Builder\Address;

    /**
     * Creates an artifact builder.
     */
    public function artifact(): Builder\Artifact;

    /**
     * Creates an artifact change builder.
     */
    public function artifactChange(): Builder\ArtifactChange;

    /**
     * Creates an artifact content builder.
     */
    public function artifactContent(): Builder\ArtifactContent;

    /**
     * Creates an artifact location builder.
     */
    public function artifactLocation(): Builder\ArtifactLocation;

    /**
     * Creates an automation details builder.
     */
    public function automationDetails(): Builder\AutomationDetails;

    /**
     * Creates an attachment builder.
     */
    public function attachment(): Builder\Attachment;

    /**
     * Creates a configuration builder.
     */
    public function configuration(): Builder\Configuration;

    /**
     * Creates a configuration override builder.
     */
    public function configurationOverride(): Builder\ConfigurationOverride;

    /**
     * Creates a conversion builder.
     */
    public function conversion(): Builder\Conversion;

    /**
     * Creates a code flow builder.
     */
    public function codeFlow(): Builder\CodeFlow;

    /**
     * Creates a descriptor builder.
     */
    public function descriptor(): Builder\Descriptor;

    /**
     * Creates a descriptor reference builder.
     */
    public function descriptorReference(): Builder\DescriptorReference;

    /**
     * Creates a driver builder.
     */
    public function driver(): Builder\Driver;

    /**
     * Creates a runtime exception
     */
    public function exception(): Builder\Exception;

    /**
     * Creates an edge builder.
     */
    public function edge(): Builder\Edge;

    /**
     * Creates an edge traversal builder.
     */
    public function edgeTraversal(): Builder\EdgeTraversal;

    /**
     * Creates an extension builder.
     */
    public function extension(): Builder\Extension;

    /**
     * Creates an inline external properties builder.
     */
    public function externalProperties(): Builder\ExternalProperties;

    /**
     * Creates an external property file reference builder;
     */
    public function externalPropertyFileReference(): Builder\ExternalPropertyFileReference;

    /**
     * Creates an external property file references builder.
     */
    public function externalPropertyFileReferences(): Builder\ExternalPropertyFileReferences;

    /**
     * Creates a fix builder.
     */
    public function fix(): Builder\Fix;

    /**
     * Creates a graph builder.
     */
    public function graph(): Builder\Graph;

    /**
     * Creates a graph traversal builder.
     */
    public function graphTraversal(): Builder\GraphTraversal;

    /**
     * Creates an invocation builder.
     */
    public function invocation(): Builder\Invocation;

    /**
     * Creates a location builder.
     */
    public function location(): Builder\Location;

    /**
     * Creates a logical location builder.
     */
    public function logicalLocation(): Builder\LogicalLocation;

    /**
     * Creates a location relationship builder.
     */
    public function locationRelationship(): Builder\LocationRelationship;

    /**
     * Creates a node builder.
     */
    public function node(): Builder\Node;

    /**
     * Creates a notification builder.
     */
    public function notification(): Builder\Notification;

    /**
     * Creates a physical location builder.
     */
    public function physicalLocation(): Builder\PhysicalLocation;

    /**
     * Creates a property builder.
     */
    public function propertyBag(): Builder\PropertyBag;

    /**
     * Creates a rectangle builder.
     */
    public function rectangle(): Builder\Rectangle;

    /**
     * Creates a region builder.
     */
    public function region(): Builder\Region;

    /**
     * Creates a relationship builder.
     */
    public function relationship(): Builder\Relationship;

    /**
     * Creates a replacement builder.
     */
    public function replacement(): Builder\Replacement;

    /**
     * Creates a result builder.
     *
     * @param string[] $arguments
     */
    public function result(string $messageText, string $messageId = '', array $arguments = []): Builder\Result;

    /**
     * Creates a result provenance builder.
     */
    public function resultProvenance(): Builder\ResultProvenance;

    /**
     * Creates a rule builder.
     */
    public function rule(): Builder\Rule;

    /**
     * Creates a run builder.
     */
    public function run(): Builder\Run;

    /**
     * Creates a stack builder.
     */
    public function stack(): Builder\Stack;

    /**
     * Creates a stack frame builder.
     */
    public function stackFrame(): Builder\StackFrame;

    /**
     * Creates a suppression builder.
     */
    public function suppression(): Builder\Suppression;

    /**
     * Creates a special location builder.
     */
    public function specialLocations(): Builder\SpecialLocations;

    /**
     * Creates a specification builder.
     */
    public function specification(string $version): Builder\Specification;

    /**
     * Creates a thread flow builder.
     */
    public function threadFlow(): Builder\ThreadFlow;

    /**
     * Creates a thread flow location builder.
     */
    public function threadFlowLocation(): Builder\ThreadFlowLocation;

    /**
     * Creates a tool builder.
     */
    public function tool(): Builder\Tool;

    /**
     * Creates a tool component builder.
     */
    public function toolComponent(): Builder\ToolComponent;

    /**
     * Creates a translation metadata builder.
     */
    public function translationMetadata(): Builder\TranslationMetadata;

    /**
     * Creates a version control details builder.
     */
    public function versionControlDetails(): Builder\VersionControlDetails;

    /**
     * Creates a web request builder.
     */
    public function webRequest(): Builder\WebRequest;

    /**
     * Creates a web response builder.
     */
    public function webResponse(): Builder\WebResponse;
}
