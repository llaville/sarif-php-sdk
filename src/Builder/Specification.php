<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;
use Bartlett\Sarif\SarifLog;

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
