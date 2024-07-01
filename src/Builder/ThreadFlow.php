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
final class ThreadFlow extends Declaration
{
    protected ?string $id;
    /**
     * @var Definition\ThreadFlowLocation[] $locations
     */
    protected array $locations;
    protected Definition\Message $message;

    public function __construct()
    {
        $this->locations = [];
    }

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function message(string $messageText, string $messageId = ''): self
    {
        $this->message = new Definition\Message();
        $this->message->setText($messageText);
        $this->message->setId($messageId);
        return $this;
    }

    public function addLocation(ThreadFlowLocation $location): self
    {
        $this->locations[] = $location->build();
        return $this;
    }

    /**
     * Builds a valued instance of ThreadFlow definition.
     */
    public function build(): Definition\ThreadFlow
    {
        $threadFlow = new Definition\ThreadFlow();
        $this->populate($threadFlow);
        return $threadFlow;
    }
}
