<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Bartlett\Sarif\Factory\BuilderFactory;

$factory = new BuilderFactory();

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/result.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('CodeScanner')
                            ->semanticVersion('1.1.2-beta.12')
                            ->informationUri('https://codeScanner.dev')
                    )
            )
    )
    ->addInlineExternalProperties(
        $factory->externalProperties()
            ->guid('00001111-2222-1111-8888-555566667777')
            ->runGuid('88889999-AAAA-1111-8888-DDDDEEEEFFFF')
            ->addArtifact(
                $factory->artifact()
                    ->location(
                        $factory->artifactLocation()
                            ->uri('apple.png')
                    )
                    ->mimeType('image/png')
            )
            ->addArtifact(
                $factory->artifact()
                    ->location(
                        $factory->artifactLocation()
                            ->uri('banana.png')
                    )
                    ->mimeType('image/png')
            )
            ->externalizedProperties(
                $factory->propertyBag()
                    ->addProperty('team', 'Security Assurance Team')
            )
    )
;
