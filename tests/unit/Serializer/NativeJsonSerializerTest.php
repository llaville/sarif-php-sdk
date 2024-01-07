<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Tests\unit\Serializer;

use Bartlett\Sarif\SarifLog;
use Bartlett\Sarif\Tests\TestCase;

use PHPUnit\Framework\Attributes\DataProvider;

use DomainException;
use Generator;

/**
 * @author Laurent Laville
 * @since Release 1.1.0
 */
final class NativeJsonSerializerTest extends TestCase
{
    public static function sarifLogDataProvider(): Generator
    {
        $examples = [
            '' => DomainException::class,
            'message/embeddedLinks' => null,
            'message/formatted' => null,
            'message/plainText' => null,
            'message/stringLookup' => null,
            'address' => null,
            'artifact' => null,
            'attachment' => null,
            'codeFlow' => null,
            'configurationOverride' => null,
            'conversion' => null,
            'exception' => null,
            'externalProperties' => null,
            'externalPropertyFileReferences' => null,
            'fix' => null,
            'graph' => null,
            'graphTraversal' => null,
            'locationRelationship' => null,
            'logicalLocation' => null,
            'physicalLocation' => null,
            'rectangle' => null,
            'reportingConfiguration' => null,
            'reportingDescriptor' => null,
            'reportingDescriptorReference' => null,
            'reportingDescriptorRelationship' => null,
            'result' => null,
            'resultProvenance' => null,
            'run' => null,
            'runAutomationDetails' => null,
            'sarifLog' => null,
            'specialLocations' => null,
            'stack' => null,
            'suppression' => null,
            'tool' => null,
            'translationMetadata' => null,
            'versionControlDetails' => null,
            'webRequest' => null,
        ];

        foreach ($examples as $example => $expectException) {
            $log = new SarifLog();
            if (empty($example)) {
                $description = 'basic SarifLog instance';
            } else {
                /** Should provide SarifLog instance referenced by $log variable  */
                require_once dirname(__DIR__, 3) . '/examples/' . $example . '.php';
                $description = 'examples/' . $example;
            }
            yield $description => [$example, $log, $expectException];
        }
    }

    #[DataProvider('sarifLogDataProvider')]
    public function testBuildReport(string $example, SarifLog $sarifLog, ?string $expectException): void
    {
        if (!empty($expectException)) {
            $this->expectException($expectException);
        }

        $jsonString = (string) $sarifLog;
        $this->assertJsonStringEqualsJsonFile(
            dirname(__DIR__, 2) . '/results/' . $example . '.json',
            $jsonString
        );
    }
}
