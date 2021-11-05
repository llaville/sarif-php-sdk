<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Laurent Laville
 */

use Bartlett\Sarif\Definition\ConfigurationOverride;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\ReportingConfiguration;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\ReportingDescriptorReference;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\SarifLog;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$driver = new ToolComponent('CodeScanner');
$driver->setInformationUri('https://codeScanner.dev');
$driver->setSemanticVersion('1.1.2-beta.12');

$rule = new ReportingDescriptor('CA2101');
$reportingConf = new ReportingConfiguration();
$reportingConf->setLevel('error');
$rule->setDefaultConfiguration($reportingConf);
$driver->addRules([$rule]);

$tool = new Tool($driver);

$ruleConf = new ReportingConfiguration();
$ruleConf->setLevel('warning');

$confOverrides = new ConfigurationOverride();
$descriptor = new ReportingDescriptorReference(0);
$confOverrides->setDescriptor($descriptor);
$confOverrides->setConfiguration($ruleConf);

$invocation = new Invocation(true);
$invocation->addRuleConfigurationOverrides([$confOverrides]);

$run = new Run($tool);
$run->addInvocations([$invocation]);

$log = new SarifLog([$run]);

try {
    echo $log, PHP_EOL;
} catch (Exception $e) {
    echo "Unable to produce SARIF report due to following error: " . $e->getMessage(), PHP_EOL;
}
