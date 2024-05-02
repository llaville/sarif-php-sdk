<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Converter;

use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\ToolComponent;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
interface ConverterInterface
{
    public function toolDriver(): ToolComponent;

    /**
     * @return ToolComponent[]
     */
    public function toolExtensions(): array;

    /**
     * @return array<ReportingDescriptor>
     */
    public function rules(): array;

    /**
     * @return Invocation[]
     */
    public function invocations(?PropertyBag $properties = null): array;

    /**
     * @param Invocation[] $invocations
     */
    public function run(array $invocations): Run;

    /**
     * @param Run[] $runs
     */
    public function sarifLog(array $runs = [], string $version = '2.1.0'): ?string;
}
