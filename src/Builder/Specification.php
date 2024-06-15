<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;
use Bartlett\Sarif\SarifLog;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
final class Specification
{
    protected string $version;
    /**
     * @var Run[] $runs
     */
    protected array $runs;
    /**
     * @var Definition\ExternalProperties[] $externalProperties
     */
    protected array $externalProperties;

    public function __construct(string $version)
    {
        $this->version = $version;
        $this->externalProperties = [];
    }

    public function addRun(Run $run): self
    {
        $this->runs[] = $run;
        return $this;
    }

    public function addInlineExternalProperties(ExternalProperties $externalProperties): self
    {
        $this->externalProperties[] = $externalProperties->build();
        return $this;
    }

    /**
     * Builds a valued instance of SarifLog.
     */
    public function build(): SarifLog
    {
        $runs = [];
        foreach ($this->runs ?? [] as $run) {
            $runs[] = $run->build();
        }
        $log = new SarifLog($runs, $this->version);
        $log->addInlineExternalProperties($this->externalProperties);
        return $log;
    }
}
