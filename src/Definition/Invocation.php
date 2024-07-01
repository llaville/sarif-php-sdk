<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property;

/**
 * The runtime environment of the analysis tool run.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317567
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Invocation extends JsonSerializable
{
    /**
     * The command line used to invoke the tool.
     */
    use Property\CommandLine;

    /**
     * An array of strings, containing in order the command line arguments passed to the tool from the operating system.
     */
    use Property\Arguments;

    /**
     * The locations of any response files specified on the tool's command line.
     */
    use Property\ResponseFiles;

    /**
     * The Coordinated Universal Time (UTC) date and time at which the invocation started.
     * See "Date/time properties" in the SARIF spec for the required format.
     */
    use Property\StartTimeUtc;

    /**
     * The Coordinated Universal Time (UTC) date and time at which the invocation ended.
     * See "Date/time properties" in the SARIF spec for the required format.
     */
    use Property\EndTimeUtc;

    /**
     * The process exit code.
     */
    use Property\ExitCode;

    /**
     * An array of configurationOverride objects that describe rules related runtime overrides.
     */
    use Property\RuleConfigurationOverrides;

    /**
     * An array of configurationOverride objects that describe notifications related runtime overrides.
     */
    use Property\NotificationConfigurationOverrides;

    /**
     * A list of runtime conditions detected by the tool during the analysis.
     */
    use Property\ToolExecutionNotifications;

    /**
     * The reason for the process exit.
     */
    use Property\ExitCodeDescription;

    /**
     * The name of the signal that caused the process to exit.
     */
    use Property\ExitSignalName;

    /**
     * The numeric value of the signal that caused the process to exit.
     */
    use Property\ExitSignalNumber;

    /**
     * The reason given by the operating system that the process failed to start.
     */
    use Property\ProcessStartFailureMessage;

    /**
     * Specifies whether the tool's execution completed successfully.
     */
    use Property\ExecutionSuccessful;

    /**
     * The machine on which the invocation occurred.
     */
    use Property\Machine;

    /**
     * The account under which the invocation occurred.
     */
    use Property\Account;

    /**
     * The id of the process in which the invocation occurred.
     */
    use Property\ProcessId;

    /**
     * An absolute URI specifying the location of the executable that was invoked.
     */
    use Property\ExecutableLocation;

    /**
     * The working directory for the invocation.
     */
    use Property\WorkingDirectory;

    /**
     * The environment variables associated with the analysis tool process, expressed as key/value pairs.
     */
    use Property\EnvironmentVariables;

    /**
     * A file containing the standard input stream to the process that was invoked.
     */
    use Property\Stdin;

    /**
     * A file containing the standard output stream from the process that was invoked.
     */
    use Property\Stdout;

    /**
     * A file containing the standard error stream from the process that was invoked.
     */
    use Property\Stderr;

    /**
     * A file containing the interleaved standard output and standard error stream from the process that was invoked.
     */
    use Property\StdoutStderr;

    /**
     * Key/value pairs that provide additional information about the invocation.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = ['executionSuccessful'];
        $optional = [
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
        parent::__construct($required, $optional);
    }
}
