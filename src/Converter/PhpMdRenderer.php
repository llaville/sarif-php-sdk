<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Converter;

use PHPMD\AbstractRenderer;
use PHPMD\PHPMD;
use PHPMD\Report;
use PHPMD\RuleViolation;

/**
 * @author Laurent Laville
 * @since Release 1.4.0
 */
class PhpMdRenderer extends AbstractRenderer
{
    protected PhpMdConverter $innerConverter;

    public function __construct(?PhpMdConverter $innerConverter = null)
    {
        $this->innerConverter = $innerConverter ?? new PhpMdConverter();
    }

    /**
     * @inheritDoc
     */
    public function renderReport(Report $report): void
    {
        $writer = $this->getWriter();
        $writer->write($this->innerConverter->generateReport($report));
    }
}
