<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\ArtifactLocationAssociation;
use Bartlett\Sarif\Property\AssociatedComponent;
use Bartlett\Sarif\Property\Contents;
use Bartlett\Sarif\Property\DottedQuadFileVersion;
use Bartlett\Sarif\Property\DownloadUri;
use Bartlett\Sarif\Property\FullDescription;
use Bartlett\Sarif\Property\FullName;
use Bartlett\Sarif\Property\GlobalMessageStrings;
use Bartlett\Sarif\Property\Guid;
use Bartlett\Sarif\Property\InformationUri;
use Bartlett\Sarif\Property\IsComprehensible;
use Bartlett\Sarif\Property\Language;
use Bartlett\Sarif\Property\LocalizedDataSemanticVersion;
use Bartlett\Sarif\Property\MinimumRequiredLocalizedDataSemanticVersion;
use Bartlett\Sarif\Property\Name;
use Bartlett\Sarif\Property\Notifications;
use Bartlett\Sarif\Property\Organization;
use Bartlett\Sarif\Property\Product;
use Bartlett\Sarif\Property\ProductSuite;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\ReleaseDateUtc;
use Bartlett\Sarif\Property\Rules;
use Bartlett\Sarif\Property\SemanticVersion;
use Bartlett\Sarif\Property\ShortDescription;
use Bartlett\Sarif\Property\SupportedTaxonomies;
use Bartlett\Sarif\Property\Taxa;
use Bartlett\Sarif\Property\TranslationMetadataRequired;
use Bartlett\Sarif\Property\Version;

/**
 * A component, such as a plug-in or the driver, of the analysis tool that was run.
 *
 * @author Laurent Laville
 */
final class ToolComponent extends JsonSerializable
{
    /**
     * A unique identifier for the tool component in the form of a GUID.
     */
    use Guid;

    /**
     * The name of the tool component.
     */
    use Name;

    /**
     * The organization or company that produced the tool component.
     */
    use Organization;

    /**
     * A product suite to which the tool component belongs.
     */
    use Product;

    /**
     * A localizable string containing the name of the suite of products to which the tool component belongs.
     */
    use ProductSuite;

    /**
     * A brief description of the tool component.
     */
    use ShortDescription;

    /**
     * A comprehensive description of the tool component.
     */
    use FullDescription;

    /**
     * The name of the tool component along with its version and any other useful identifying information, such as its locale.
     */
    use FullName;

    /**
     * The tool component version, in whatever format the component natively provides.
     */
    use Version;

    /**
     * The tool component version in the format specified by Semantic Versioning 2.0.
     */
    use SemanticVersion;

    /**
     * The binary version of the tool component's primary executable file expressed as four non-negative integers
     * separated by a period (for operating systems that express file versions in this way).
     */
    use DottedQuadFileVersion;

    /**
     * A string specifying the UTC date (and optionally, the time) of the component's release.
     */
    use ReleaseDateUtc;

    /**
     * The absolute URI from which the tool component can be downloaded.
     */
    use DownloadUri;

    /**
     * The absolute URI at which information about this version of the tool component can be found.
     */
    use InformationUri;

    /**
     * A dictionary, each of whose keys are a resource identifier and each of whose values are a multiformatMessageString object,
     * which holds message strings in plain text and (optionally) Markdown format.
     * The strings can include placeholders, which can be used to construct a message in combination
     * with an arbitrary number of additional string arguments.
     */
    use GlobalMessageStrings;

    /**
     * An array of reportingDescriptor objects relevant to the notifications related to the configuration
     * and runtime execution of the tool component.
     */
    use Notifications;

    /**
     * An array of reportingDescriptor objects relevant to the analysis performed by the tool component.
     */
    use Rules;

    /**
     * An array of reportingDescriptor objects relevant to the definitions of both standalone and tool-defined taxonomies.
     */
    use Taxa;

    /**
     * An array of the artifactLocation objects associated with the tool component.
     */
    use ArtifactLocationAssociation;

    /**
     * The language of the messages emitted into the log file during this run
     * (expressed as an ISO 639-1 two-letter lowercase language code) and an optional region
     * (expressed as an ISO 3166-1 two-letter uppercase subculture code associated with a country or region).
     * The casing is recommended but not required (in order for this data to conform to RFC5646).
     */
    use Language;

    /**
     * The kinds of data contained in this object.
     */
    use Contents;

    /**
     * Specifies whether this object contains a complete definition of the localizable and/or non-localizable data
     * for this component, as opposed to including only data that is relevant to the results persisted to this log file.
     */
    use IsComprehensible;

    /**
     * The semantic version of the localized strings defined in this component;
     * maintained by components that provide translations.
     */
    use LocalizedDataSemanticVersion;

    /**
     * The minimum value of localizedDataSemanticVersion required in translations consumed by this component;
     * used by components that consume translations.
     */
    use MinimumRequiredLocalizedDataSemanticVersion;

    /**
     * The component which is strongly associated with this component.
     * For a translation, this refers to the component which has been translated.
     * For an extension, this is the driver that provides the extension's plugin model.
     */
    use AssociatedComponent;

    /**
     * Translation metadata, required for a translation, not populated by other component types.
     */
    use TranslationMetadataRequired;

    /**
     * An array of toolComponentReference objects to declare the taxonomies supported by the tool component.
     */
    use SupportedTaxonomies;

    /**
     * Key/value pairs that provide additional information about the tool component.
     */
    use Properties;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->rules = [];

        $this->required = ['name'];
        $this->optional = [
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
    }
}
