<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Account;
use Bartlett\Sarif\Property\Arguments;
use Bartlett\Sarif\Property\CommandLine;
use Bartlett\Sarif\Property\EndTimeUtc;
use Bartlett\Sarif\Property\EnvironmentVariables;
use Bartlett\Sarif\Property\ExecutableLocation;
use Bartlett\Sarif\Property\ExecutionSuccessful;
use Bartlett\Sarif\Property\ExitCode;
use Bartlett\Sarif\Property\ExitCodeDescription;
use Bartlett\Sarif\Property\ExitSignalName;
use Bartlett\Sarif\Property\ExitSignalNumber;
use Bartlett\Sarif\Property\Machine;
use Bartlett\Sarif\Property\NotificationConfigurationOverrides;
use Bartlett\Sarif\Property\ProcessId;
use Bartlett\Sarif\Property\ProcessStartFailureMessage;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\ResponseFiles;
use Bartlett\Sarif\Property\RuleConfigurationOverrides;
use Bartlett\Sarif\Property\StartTimeUtc;
use Bartlett\Sarif\Property\Stderr;
use Bartlett\Sarif\Property\Stdin;
use Bartlett\Sarif\Property\Stdout;
use Bartlett\Sarif\Property\StdoutStderr;
use Bartlett\Sarif\Property\ToolExecutionNotifications;
use Bartlett\Sarif\Property\WorkingDirectory;

/**
 * The runtime environment of the analysis tool run.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317567
 * @author Laurent Laville
 */
final class Invocation extends JsonSerializable
{
    /**
     * The command line used to invoke the tool.
     */
    use CommandLine;

    /**
     * An array of strings, containing in order the command line arguments passed to the tool from the operating system.
     */
    use Arguments;

    /**
     * The locations of any response files specified on the tool's command line.
     */
    use ResponseFiles;

    /**
     * The Coordinated Universal Time (UTC) date and time at which the invocation started.
     * See "Date/time properties" in the SARIF spec for the required format.
     */
    use StartTimeUtc;

    /**
     * The Coordinated Universal Time (UTC) date and time at which the invocation ended.
     * See "Date/time properties" in the SARIF spec for the required format.
     */
    use EndTimeUtc;

    /**
     * The process exit code.
     */
    use ExitCode;

    /**
     * An array of configurationOverride objects that describe rules related runtime overrides.
     */
    use RuleConfigurationOverrides;

    /**
     * An array of configurationOverride objects that describe notifications related runtime overrides.
     */
    use NotificationConfigurationOverrides;

    /**
     * A list of runtime conditions detected by the tool during the analysis.
     */
    use ToolExecutionNotifications;

    /**
     * The reason for the process exit.
     */
    use ExitCodeDescription;

    /**
     * The name of the signal that caused the process to exit.
     */
    use ExitSignalName;

    /**
     * The numeric value of the signal that caused the process to exit.
     */
    use ExitSignalNumber;

    /**
     * The reason given by the operating system that the process failed to start.
     */
    use ProcessStartFailureMessage;

    /**
     * Specifies whether the tool's execution completed successfully.
     */
    use ExecutionSuccessful;

    /**
     * The machine on which the invocation occurred.
     */
    use Machine;

    /**
     * The account under which the invocation occurred.
     */
    use Account;

    /**
     * The id of the process in which the invocation occurred.
     */
    use ProcessId;

    /**
     * An absolute URI specifying the location of the executable that was invoked.
     */
    use ExecutableLocation;

    /**
     * The working directory for the invocation.
     */
    use WorkingDirectory;

    /**
     * The environment variables associated with the analysis tool process, expressed as key/value pairs.
     */
    use EnvironmentVariables;

    /**
     * A file containing the standard input stream to the process that was invoked.
     */
    use Stdin;

    /**
     * A file containing the standard output stream from the process that was invoked.
     */
    use Stdout;

    /**
     * A file containing the standard error stream from the process that was invoked.
     */
    use Stderr;

    /**
     * A file containing the interleaved standard output and standard error stream from the process that was invoked.
     */
    use StdoutStderr;

    /**
     * Key/value pairs that provide additional information about the invocation.
     */
    use Properties;

    /**
     * @param bool $executionSuccessful
     */
    public function __construct(bool $executionSuccessful)
    {
        $this->executionSuccessful = $executionSuccessful;

        $this->required = ['executionSuccessful'];
        $this->optional = [
            'commandLine',
            'arguments',
            'responseFiles',
            'startTimeUtc',
            'endTimeUtc',
            'exitCode',
            'ruleConfigurationOverrides',
            'notificationConfigurationOverrides',
            'toolExecutionNotifications',
            'toolConfigurationNotifications',
            'exitCodeDescription',
            'exitSignalName',
            'exitSignalNumber',
            'processStartFailureMessage',
            'executionSuccessful',
            'machine',
            'account',
            'processId',
            'executableLocation',
            'workingDirectory',
            'environmentVariables',
            'stdin',
            'stdout',
            'stderr',
            'stdoutStderr',
            'properties',
        ];
    }
}
