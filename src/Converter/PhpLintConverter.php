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
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\Result;

use Overtrue\PHPLint\Output\LinterOutput;

use function getcwd;
use function hash_file;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
class PhpLintConverter extends AbstractConverter
{
    protected const TOOL_NAME = 'PHPLint';
    protected const TOOL_SHORT_DESCRIPTION = 'Syntax check only (lint) of PHP files';
    protected const TOOL_FULL_DESCRIPTION = 'PHPLint is a tool that can speed up linting of php files by running several lint processes at once.';
    protected const TOOL_INFO_URI = 'https://github.com/overtrue/phplint';
    protected const TOOL_COMPOSER_PACKAGE = 'overtrue/phplint';

    public function format(LinterOutput $results): string
    {
        $failures = $results->getFailures();

        foreach ($failures as $file => $failure) {
            $fingerprints = hash_file('sha256', $file);

            $result = new Result(new Message($failure['error']));
            $result->addPartialFingerprints(['syntaxError' => $fingerprints]);

            $artifactLocation = new ArtifactLocation();
            $artifactLocation->setUri($this->pathToArtifactLocation($file));
            $artifactLocation->setUriBaseId('WORKINGDIR');

            $location = new Location();
            $physicalLocation = new PhysicalLocation($artifactLocation);
            $physicalLocation->setRegion(new Region($failure['line']));
            $location->setPhysicalLocation($physicalLocation);
            $result->addLocations([$location]);

            $this->results[] = $result;
        }

        $run = $this->run($this->invocations());

        $workingDir = new ArtifactLocation();
        $workingDir->setUri($this->pathToUri(getcwd() . '/'));
        $originalUriBaseIds = [
            'WORKINGDIR' => $workingDir,
        ];
        $run->addAdditionalProperties($originalUriBaseIds);

        return $this->sarifLog([$run]);
    }
}
