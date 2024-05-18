<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Converter;

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;

use PHPStan\Command\AnalysisResult;
use PHPStan\Command\ErrorFormatter\ErrorFormatter;
use PHPStan\Command\Output;

use function getcwd;
use function hash_file;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
class PhpStanConverter extends AbstractConverter implements ErrorFormatter
{
    protected const TOOL_NAME = 'PHPStan';
    protected const TOOL_SHORT_DESCRIPTION = 'PHP Static Analysis Tool';
    protected const TOOL_FULL_DESCRIPTION = 'PHPStan - PHP Static Analysis Tool';
    protected const TOOL_INFO_URI = 'https://phpstan.org';
    protected const TOOL_COMPOSER_PACKAGE = 'phpstan/phpstan-src';

    public function formatErrors(AnalysisResult $analysisResult, Output $output): int
    {
        foreach ($analysisResult->getFileSpecificErrors() as $fileSpecificError) {
            $file = $fileSpecificError->getFile();

            $fingerprints = hash_file('sha256', $file);

            $result = new Result(new Message($fileSpecificError->getMessage()));
            $result->addPartialFingerprints(['codingStandard' => $fingerprints]);

            $artifactLocation = new ArtifactLocation();
            $artifactLocation->setUri($this->pathToArtifactLocation($file));
            $artifactLocation->setUriBaseId('WORKINGDIR');

            $location = new Location();
            $physicalLocation = new PhysicalLocation($artifactLocation);
            $physicalLocation->setRegion(new Region($fileSpecificError->getLine()));
            $location->setPhysicalLocation($physicalLocation);
            $result->addLocations([$location]);

            $properties = new PropertyBag();
            $properties->addProperty('ignorable', $fileSpecificError->canBeIgnored());
            $result->setProperties($properties);

            $this->results[] = $result;
        }

        $run = $this->run($this->invocations());

        $workingDir = new ArtifactLocation();
        $workingDir->setUri($this->pathToUri(getcwd() . '/'));
        $originalUriBaseIds = [
            'WORKINGDIR' => $workingDir,
        ];
        $run->addAdditionalProperties($originalUriBaseIds);

        $jsonString = $this->sarifLog([$run]);

        $output->writeLineFormatted($jsonString);

        return $analysisResult->hasErrors() ? 1 : 0;
    }
}
