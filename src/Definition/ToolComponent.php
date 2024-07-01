<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property;

/**
 * A component, such as a plug-in or the driver, of the analysis tool that was run.
 *
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ToolComponent extends JsonSerializable
{
    /**
     * A unique identifier for the tool component in the form of a GUID.
     */
    use Property\Guid;

    /**
     * The name of the tool component.
     */
    use Property\Name;

    /**
     * The organization or company that produced the tool component.
     */
    use Property\Organization;

    /**
     * A product suite to which the tool component belongs.
     */
    use Property\Product;

    /**
     * A localizable string containing the name of the suite of products to which the tool component belongs.
     */
    use Property\ProductSuite;

    /**
     * A brief description of the tool component.
     */
    use Property\ShortDescription;

    /**
     * A comprehensive description of the tool component.
     */
    use Property\FullDescription;

    /**
     * The name of the tool component along with its version and any other useful identifying information, such as its locale.
     */
    use Property\FullName;

    /**
     * The tool component version, in whatever format the component natively provides.
     */
    use Property\Version;

    /**
     * The tool component version in the format specified by Semantic Versioning 2.0.
     */
    use Property\SemanticVersion;

    /**
     * The binary version of the tool component's primary executable file expressed as four non-negative integers
     * separated by a period (for operating systems that express file versions in this way).
     */
    use Property\DottedQuadFileVersion;

    /**
     * A string specifying the UTC date (and optionally, the time) of the component's release.
     */
    use Property\ReleaseDateUtc;

    /**
     * The absolute URI from which the tool component can be downloaded.
     */
    use Property\DownloadUri;

    /**
     * The absolute URI at which information about this version of the tool component can be found.
     */
    use Property\InformationUri;

    /**
     * A dictionary, each of whose keys are a resource identifier and each of whose values are a multiformatMessageString object,
     * which holds message strings in plain text and (optionally) Markdown format.
     * The strings can include placeholders, which can be used to construct a message in combination
     * with an arbitrary number of additional string arguments.
     */
    use Property\GlobalMessageStrings;

    /**
     * An array of reportingDescriptor objects relevant to the notifications related to the configuration
     * and runtime execution of the tool component.
     */
    use Property\Notifications;

    /**
     * An array of reportingDescriptor objects relevant to the analysis performed by the tool component.
     */
    use Property\Rules;

    /**
     * An array of reportingDescriptor objects relevant to the definitions of both standalone and tool-defined taxonomies.
     */
    use Property\Taxa;

    /**
     * An array of the artifactLocation objects associated with the tool component.
     */
    use Property\ArtifactLocationAssociation;

    /**
     * The language of the messages emitted into the log file during this run
     * (expressed as an ISO 639-1 two-letter lowercase language code) and an optional region
     * (expressed as an ISO 3166-1 two-letter uppercase subculture code associated with a country or region).
     * The casing is recommended but not required (in order for this data to conform to RFC5646).
     */
    use Property\Language;

    /**
     * The kinds of data contained in this object.
     */
    use Property\Contents;

    /**
     * Specifies whether this object contains a complete definition of the localizable and/or non-localizable data
     * for this component, as opposed to including only data that is relevant to the results persisted to this log file.
     */
    use Property\IsComprehensible;

    /**
     * The semantic version of the localized strings defined in this component;
     * maintained by components that provide translations.
     */
    use Property\LocalizedDataSemanticVersion;

    /**
     * The minimum value of localizedDataSemanticVersion required in translations consumed by this component;
     * used by components that consume translations.
     */
    use Property\MinimumRequiredLocalizedDataSemanticVersion;

    /**
     * The component which is strongly associated with this component.
     * For a translation, this refers to the component which has been translated.
     * For an extension, this is the driver that provides the extension's plugin model.
     */
    use Property\AssociatedComponent;

    /**
     * Translation metadata, required for a translation, not populated by other component types.
     */
    use Property\TranslationMetadataRequired;

    /**
     * An array of toolComponentReference objects to declare the taxonomies supported by the tool component.
     */
    use Property\SupportedTaxonomies;

    /**
     * Key/value pairs that provide additional information about the tool component.
     */
    use Property\Properties;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->rules = [];

        $required = ['name'];
        $optional = [
            'guid',
            'organization',
            'product',
            'productSuite',
            'shortDescription',
            'fullDescription',
            'fullName',
            'version',
            'semanticVersion',
            'dottedQuadFileVersion',
            'releaseDateUtc',
            'downloadUri',
            'informationUri',
            'globalMessageStrings',
            'notifications',
            'rules',
            'taxa',
            'locations',
            'language',
            'contents',
            'isComprehensive',
            'localizedDataSemanticVersion',
            'minimumRequiredLocalizedDataSemanticVersion',
            'associatedComponent',
            'translationMetadata',
            'supportedTaxonomies',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
