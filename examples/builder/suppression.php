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

// @link https://github.com/llaville/sarif-php-sdk/blob/1.1/docs/reference/suppression.md
$spec = $factory->specification('2.1.0')
    ->addRun(
        $factory->run()
            ->tool(
                $factory->tool()
                    ->driver(
                        $factory->driver()
                            ->name('Psalm')
                            ->version('4.x-dev')
                            ->informationUri('https://psalm.de')
                    )
            )
            ->addResult(
                $factory->result()
                    ->message(
                        $factory->message()
                            ->text('Request to suppress a result')
                    )
                    ->addSuppression(
                        $factory->suppression()
                            ->kind('inSource')
                            ->guid('11111111-1111-1111-8888-111111111111')
                            ->status('underReview')
                            ->justification('result outdated')
                    )
            )
    )
;
