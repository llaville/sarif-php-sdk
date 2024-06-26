<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 * @since Release 1.1.0
 */

if ($_SERVER['argc'] == 1) {
    echo '=====================================================================', PHP_EOL;
    echo 'Usage: php resources/serialize.php <example-filename>', PHP_EOL;
    echo '                                   <folder>', PHP_EOL;
    echo '                                   <json-encode-options> (pretty print: 128, unescaped slashes: 64)', PHP_EOL;
    echo '=====================================================================', PHP_EOL;
    exit();
}

$script = $_SERVER['argv'][1] ?? null;
$folder = $_SERVER['argv'][2] ?? sys_get_temp_dir();
$jsonEncodeOptions = $_SERVER['argv'][3] ?? 0;

$baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'examples' . DIRECTORY_SEPARATOR;
$example = $baseDir . $script . '.php';
$available = is_file($example) && file_exists($example);

if (empty($script) || !$available) {
    throw new LogicException(sprintf('Unable to run this example script "%s"', $script));
}

require_once $example;

if (!isset($log) || !$log instanceof \Bartlett\Sarif\SarifLog) {
    throw new LogicException(sprintf('Example script "%s" does not provide a SarifLog object', $script));
}

/**
 * Serializer creation:
 * - default with standard PHP Json encode function via PhpSerializerFactory
 * - alternative with Symfony Serializer Component via SymfonySerializerFactory
 */
$factory = new \Bartlett\Sarif\Factory\PhpSerializerFactory();
// or
// $factory = new \Bartlett\Sarif\Factory\SymfonySerializerFactory();
// or any other factory that implement \Bartlett\Sarif\Factory\SerializerFactory interface

$serializer = $factory->createSerializer();

try {
    $jsonString = $serializer->serialize($log, 'json', ['json_encode_options' => (int) $jsonEncodeOptions]);
    $target = rtrim($folder, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $script . '.json';
    file_put_contents($target, $jsonString);
    echo (empty($target) ? 'no' : $target) . ' file generated' . PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
