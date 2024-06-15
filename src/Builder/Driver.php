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
final class Driver extends Declaration
{
    protected string $name;
    protected string $fullName;
    protected string $version;
    protected string $semanticVersion;
    protected string $informationUri;
    protected string $language;
    protected Definition\TranslationMetadata $translationMetadata;
    /**
     * @var Definition\ReportingDescriptor[] $rules
     */
    protected array $rules;

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function fullName(string $name): self
    {
        $this->fullName = $name;
        return $this;
    }

    public function version(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function semanticVersion(string $version): self
    {
        $this->semanticVersion = $version;
        return $this;
    }

    public function informationUri(string $uri): self
    {
        $this->informationUri = $uri;
        return $this;
    }

    public function language(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function translationMetadata(TranslationMetadata $translationMetadata): self
    {
        $this->translationMetadata = $translationMetadata->build();
        return $this;
    }

    public function addRule(Rule $rule): self
    {
        $this->rules[] = $rule->build();
        return $this;
    }

    /**
     * Builds a valued instance of ToolComponent definition.
     */
    public function build(): Definition\ToolComponent
    {
        $driver = new Definition\ToolComponent($this->name);
        $this->populate($driver);
        return $driver;
    }
}
