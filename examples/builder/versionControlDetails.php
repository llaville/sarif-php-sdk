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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/versionControlDetails.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('AndroidStudio')
                            ->semanticVersion('1.0.0-beta.1')
                            ->informationUri('https://android-studion.dev')
                    )
            )
            ->addVersionControlProvenance(
                $factory->versionControlDetails()
                    ->repositoryUri('https://github.com/example-corp/package')
                    ->revisionId('b87c4e9')
                    ->mappedTo(
                        $factory->artifactLocation()
                            ->uriBaseId('PACKAGE_ROOT')
                    )
            )
            ->addVersionControlProvenance(
                $factory->versionControlDetails()
                    ->repositoryUri('https://github.com/example-corp/plugin1')
                    ->revisionId('cafdac7')
                    ->mappedTo(
                        $factory->artifactLocation()
                            ->uri('plugin1')
                            ->uriBaseId('PACKAGE_ROOT')
                    )
            )
            ->addVersionControlProvenance(
                $factory->versionControlDetails()
                    ->repositoryUri('https://github.com/example-corp/plugin2')
                    ->revisionId('d0dc2c0')
                    ->mappedTo(
                        $factory->artifactLocation()
                            ->uri('plugin2')
                            ->uriBaseId('PACKAGE_ROOT')
                    )
            )
    )
;
