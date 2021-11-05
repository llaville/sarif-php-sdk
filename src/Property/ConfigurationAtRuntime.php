<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ReportingConfiguration;

/**
 * @author Laurent Laville
 */
trait ConfigurationAtRuntime
{
    /**
     * @var ReportingConfiguration
     */
    protected $configuration;

    /**
     * @param ReportingConfiguration $configuration
     */
    public function setConfiguration(ReportingConfiguration $configuration): void
    {
        $this->configuration = $configuration;
    }
}
