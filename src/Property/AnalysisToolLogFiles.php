<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ArtifactLocation;

/**
 * @author Laurent Laville
 */
trait AnalysisToolLogFiles
{
    /**
     * @var ArtifactLocation[]
     */
    protected $analysisToolLogFiles;

    /**
     * @param ArtifactLocation[] $analysisToolLogFiles
     */
    public function addAnalysisToolLogFiles(array $analysisToolLogFiles): void
    {
        foreach ($analysisToolLogFiles as $analysisToolLogFile) {
            if ($analysisToolLogFile instanceof ArtifactLocation) {
                $this->analysisToolLogFiles[] = $analysisToolLogFile;
            }
        }
    }
}
