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
final class ArtifactLocation extends Declaration
{
    protected ?Definition\Message $description;
    protected ?string $uri;
    protected ?string $uriBaseId;

    public function description(string $text): self
    {
        $this->description = new Definition\Message();
        $this->description->setText($text);
        return $this;
    }

    public function uri(string $uri): self
    {
        $this->uri = $uri;
        return $this;
    }

    public function uriBaseId(string $id): self
    {
        $this->uriBaseId = $id;
        return $this;
    }

    /**
     * Builds a valued instance of ArtifactLocation definition.
     */
    public function build(): Definition\ArtifactLocation
    {
        $location = new Definition\ArtifactLocation();
        $this->populate($location);
        return $location;
    }
}
