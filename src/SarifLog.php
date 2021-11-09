<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif;

use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\InlineExternalProperties;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Runs;
use Bartlett\Sarif\Property\Schema;
use Bartlett\Sarif\Property\Version;

use DomainException;
use Throwable;
use function array_merge;
use function json_encode;
use function sprintf;
use function trigger_error;
use const E_USER_ERROR;
use const JSON_PRETTY_PRINT;
use const PHP_VERSION_ID;

/**
 * Static Analysis Results Format (SARIF)
 *
 * A SarifLog object specifies the version of the file format and contains the output from one or more runs.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317478
 * @author Laurent Laville
 */
final class SarifLog extends JsonSerializable
{
    /**
     * The URI of the JSON schema corresponding to the version.
     */
    use Schema;

    /**
     * The SARIF format version of this log file.
     */
    use Version;

    /**
     * The set of runs contained in this log file.
     */
    use Runs;

    /**
     * References to external property files that share data between runs.
     */
    use InlineExternalProperties;

    /**
     * Key/value pairs that provide additional information about the log file.
     */
    use Properties;

    /**
     * @param Run[] $runs
     * @param string $version
     */
    public function __construct(array $runs = [], string $version = '2.1.0')
    {
        $this->schema = sprintf('https://json.schemastore.org/sarif-%s.json', $version);
        $this->version = $version;
        $this->runs = [];
        foreach ($runs as $run) {
            if ($run instanceof Run) {
                $this->runs[] = $run;
            }
        }
        $this->inlineExternalProperties = [];

        $this->required = [
            'version',
            'runs'
        ];
        $this->optional = ['inlineExternalProperties'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        try {
            if (empty($this->runs)) {
                throw new DomainException('"runs" are required. None provided.');
            }
            return json_encode($this, JSON_PRETTY_PRINT);
        } catch (Throwable $e) {
            if (PHP_VERSION_ID >= 70400) {
                throw $e;
            }
            trigger_error(
                sprintf('%s::__toString exception: %s', self::class, (string) $e),
                E_USER_ERROR
            );
            return '';
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return array_merge(['$schema' => $this->schema], parent::jsonSerialize());
    }
}
