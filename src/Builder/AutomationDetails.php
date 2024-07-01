<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
final class AutomationDetails extends Declaration
{
    protected Definition\Message $description;
    protected string $id;
    protected string $guid;
    protected string $correlationGuid;

    /**
     * @param string[] $arguments
     */
    public function description(string $text, string $id = '', array $arguments = []): self
    {
        $message = new Definition\Message();
        $message->setText($text);
        $message->setId($id);
        $message->addArguments($arguments);
        $this->description = $message;
        return $this;
    }

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function guid(string $guid): self
    {
        $this->guid = $guid;
        return $this;
    }

    public function correlationGuid(string $correlationGuid): self
    {
        $this->correlationGuid = $correlationGuid;
        return $this;
    }

    /**
     * Builds a valued instance of RunAutomationDetails definition.
     */
    public function build(): Definition\RunAutomationDetails
    {
        $automationDetails = new Definition\RunAutomationDetails();
        $this->populate($automationDetails);
        return $automationDetails;
    }
}
