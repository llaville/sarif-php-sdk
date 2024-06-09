<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Tests\unit\Builder;

use Bartlett\Sarif\Factory\PhpSerializerFactory;
use Bartlett\Sarif\SarifLog;
use Bartlett\Sarif\Tests\TestCase;

use PHPUnit\Framework\Attributes\DataProvider;

use Generator;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
final class BuilderFactoryTest extends TestCase
{
    public static function sarifLogDataProvider(): Generator
    {
        $examples = [
            'message/embeddedLinks',
            'message/formatted',
            'message/plainText',
            'message/stringLookup',
            'address',
            'artifact',
            'attachment',
            'codeFlow',
            'configurationOverride',
            'conversion',
            'exception',
            'externalProperties',
            'externalPropertyFileReferences',
            'fix',
            'graph',
            'graphTraversal',
            'locationRelationship',
            'logicalLocation',
            'physicalLocation',
            'rectangle',
            'reportingConfiguration',
            'reportingDescriptor',
            'reportingDescriptorReference',
            'reportingDescriptorRelationship',
            'result',
            'resultProvenance',
            'run',
            'runAutomationDetails',
            'sarifLog',
            'specialLocations',
            'stack',
            'suppression',
            'tool',
            'translationMetadata',
            'versionControlDetails',
            'webRequest',
        ];

        foreach ($examples as $example) {
            /** Should provide SarifLog instance referenced by $log variable  */
            require_once dirname(__DIR__, 3) . '/examples/builder/' . $example . '.php';
            $description = 'examples/builder/' . $example;
            yield $description => [$example, $spec->build()];
        }
    }

    #[DataProvider('sarifLogDataProvider')]
    public function testBuilderFactory(string $example, SarifLog $sarifLog): void
    {
        $factory = new PhpSerializerFactory();
        $serializer = $factory->createSerializer();

        $jsonString = $serializer->serialize($sarifLog, 'json');

        $this->assertJsonStringEqualsJsonFile(
            dirname(__DIR__, 2) . '/results/' . $example . '.json',
            $jsonString
        );
    }
}
