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
final class ExternalPropertyFileReferences extends Declaration
{
    protected Definition\ExternalPropertyFileReference $conversion;
    /**
     * @var Definition\ExternalPropertyFileReference[] $results
     */
    protected array $results;

    public function conversion(ExternalPropertyFileReference $conversion): self
    {
        $this->conversion = $conversion->build();
        return $this;
    }

    public function addResult(ExternalPropertyFileReference $result): self
    {
        $this->results[] = $result->build();
        return$this;
    }

    /**
     * Builds a valued instance of ExternalPropertyFileReferences definition.
     */
    public function build(): Definition\ExternalPropertyFileReferences
    {
        $externalPropertyFileReferences = new Definition\ExternalPropertyFileReferences();
        $this->populate($externalPropertyFileReferences);
        return $externalPropertyFileReferences;
    }
}
