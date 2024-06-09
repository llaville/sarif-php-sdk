<?php declare(strict_types=1);

namespace Bartlett\Sarif\Internal;

use Bartlett\Sarif\Builder\Address;
use Bartlett\Sarif\Builder\Artifact;
use Bartlett\Sarif\Builder\ArtifactChange;
use Bartlett\Sarif\Builder\ArtifactContent;
use Bartlett\Sarif\Builder\ArtifactLocation;
use Bartlett\Sarif\Builder\Attachment;
use Bartlett\Sarif\Builder\AutomationDetails;
use Bartlett\Sarif\Builder\CodeFlow;
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
use Bartlett\Sarif\Builder\Property;
use Bartlett\Sarif\Builder\PropertyBag;
use Bartlett\Sarif\Builder\Rectangle;
use Bartlett\Sarif\Builder\Region;
use Bartlett\Sarif\Builder\Relationship;
use Bartlett\Sarif\Builder\Replacement;
use Bartlett\Sarif\Builder\Configuration;
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

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
interface BuilderFactoryInterface
{
    /**
     * Creates an address builder.
     */
    public function address(): Address;

    /**
     * Creates an artifact builder.
     */
    public function artifact(): Artifact;

    /**
     * Creates an artifact change builder.
     */
    public function artifactChange(): ArtifactChange;

    /**
     * Creates an artifact content builder.
     */
    public function artifactContent(): ArtifactContent;

    /**
     * Creates an artifact location builder.
     */
    public function artifactLocation(): ArtifactLocation;

    /**
     * Creates an automation details builder.
     */
    public function automationDetails(): AutomationDetails;

    /**
     * Creates an attachment builder.
     */
    public function attachment(): Attachment;

    /**
     * Creates a configuration builder.
     */
    public function configuration(): Configuration;

    /**
     * Creates a configuration override builder.
     */
    public function configurationOverride(): ConfigurationOverride;

    /**
     * Creates a conversion builder.
     */
    public function conversion(): Conversion;

    /**
     * Creates a code flow builder.
     */
    public function codeFlow(): CodeFlow;

    /**
     * Creates a descriptor builder.
     */
    public function descriptor(): Descriptor;

    /**
     * Creates a descriptor reference builder.
     */
    public function descriptorReference(): DescriptorReference;

    /**
     * Creates a driver builder.
     */
    public function driver(): Driver;

    /**
     * Creates a runtime exception
     */
    public function exception(): Exception;

    /**
     * Creates an edge builder.
     */
    public function edge(): Edge;

    /**
     * Creates an edge traversal builder.
     */
    public function edgeTraversal(): EdgeTraversal;

    /**
     * Creates an extension builder.
     */
    public function extension(): Extension;

    /**
     * Creates an inline external properties builder.
     */
    public function externalProperties(): ExternalProperties;

    /**
     * Creates an external property file reference builder;
     */
    public function externalPropertyFileReference(): ExternalPropertyFileReference;

    /**
     * Creates an external property file references builder.
     */
    public function externalPropertyFileReferences(): ExternalPropertyFileReferences;

    /**
     * Creates a fix builder.
     */
    public function fix(): Fix;

    /**
     * Creates a graph builder.
     */
    public function graph(): Graph;

    /**
     * Creates a graph traversal builder.
     */
    public function graphTraversal(): GraphTraversal;

    /**
     * Creates an invocation builder.
     */
    public function invocation(): Invocation;

    /**
     * Creates a location builder.
     */
    public function location(): Location;

    /**
     * Creates a logical location builder.
     */
    public function logicalLocation(): LogicalLocation;

    /**
     * Creates a location relationship builder.
     */
    public function locationRelationship(): LocationRelationship;

    /**
     * Creates a node builder.
     */
    public function node(): Node;

    /**
     * Creates a notification builder.
     */
    public function notification(): Notification;

    /**
     * Creates a physical location builder.
     */
    public function physicalLocation(): PhysicalLocation;

    /**
     * Creates a property builder.
     */
    public function propertyBag(): PropertyBag;

    /**
     * Creates a rectangle builder.
     */
    public function rectangle(): Rectangle;

    /**
     * Creates a region builder.
     */
    public function region(): Region;

    /**
     * Creates a relationship builder.
     */
    public function relationship(): Relationship;

    /**
     * Creates a replacement builder.
     */
    public function replacement(): Replacement;

    /**
     * Creates a result builder.
     *
     * @param string[] $arguments
     */
    public function result(string $messageText, string $messageId = '', array $arguments = []): Result;

    /**
     * Creates a result provenance builder.
     */
    public function resultProvenance(): ResultProvenance;

    /**
     * Creates a rule builder.
     */
    public function rule(): Rule;

    /**
     * Creates a run builder.
     */
    public function run(): Run;

    /**
     * Creates a stack builder.
     */
    public function stack(): Stack;

    /**
     * Creates a stack frame builder.
     */
    public function stackFrame(): StackFrame;

    /**
     * Creates a suppression builder.
     */
    public function suppression(): Suppression;

    /**
     * Creates a special location builder.
     */
    public function specialLocations(): SpecialLocations;

    /**
     * Creates a specification builder.
     */
    public function specification(string $version): Specification;

    /**
     * Creates a thread flow builder.
     */
    public function threadFlow(): ThreadFlow;

    /**
     * Creates a thread flow location builder.
     */
    public function threadFlowLocation(): ThreadFlowLocation;

    /**
     * Creates a tool builder.
     */
    public function tool(): Tool;

    /**
     * Creates a tool component builder.
     */
    public function toolComponent(): ToolComponent;

    /**
     * Creates a translation metadata builder.
     */
    public function translationMetadata(): TranslationMetadata;

    /**
     * Creates a version control details builder.
     */
    public function versionControlDetails(): VersionControlDetails;

    /**
     * Creates a web request builder.
     */
    public function webRequest(): WebRequest;

    /**
     * Creates a web response builder.
     */
    public function webResponse(): WebResponse;
}
