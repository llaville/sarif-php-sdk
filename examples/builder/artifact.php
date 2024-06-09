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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/artifact.md
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
            ->addArtifact(
                $factory->artifact()
                    ->location(
                        $factory->artifactLocation()
                            ->uri('file:///C:/Code/app.zip')
                    )
                    ->mimeType('application/zip')
            )
            ->addArtifact(
                $factory->artifact()
                    ->location(
                        $factory->artifactLocation()
                            ->uri('docs/intro.docx')
                    )
                    ->parentIndex(0)
                    ->mimeType('application/vnd.openxmlformats-officedocument.wordprocessingml.document')
            )
            ->addArtifact(
                $factory->artifact()
                    ->offset(17522)
                    ->length(4050)
                    ->parentIndex(1)
                    ->mimeType('application/x-contoso-animation')
            )
    )
;
