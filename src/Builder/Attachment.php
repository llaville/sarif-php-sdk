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
final class Attachment extends Declaration
{
    protected Definition\ArtifactLocation $artifactLocation;
    protected Definition\Message $description;
    /**
     * @var Definition\Rectangle[] $rectangles
     */
    protected array $rectangles;

    public function artifactLocation(ArtifactLocation $artifactLocation): self
    {
        $this->artifactLocation = $artifactLocation->build();
        return $this;
    }

    public function description(string $text): self
    {
        $this->description = new Definition\Message();
        $this->description->setText($text);
        return $this;
    }

    public function addRectangle(Rectangle $rectangle): self
    {
        $this->rectangles[] = $rectangle->build();
        return $this;
    }

    /**
     * Builds a valued instance of Attachment definition.
     */
    public function build(): Definition\Attachment
    {
        $attachment = new Definition\Attachment();
        $this->populate($attachment);
        return $attachment;
    }
}
