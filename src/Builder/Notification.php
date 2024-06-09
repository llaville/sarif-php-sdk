<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Notification extends Declaration
{
    protected Definition\Message $message;
    protected string $level;
    protected Definition\ReportingDescriptorReference $descriptor;
    protected Definition\Exception $exception;

    public function message(string $messageText, string $messageId = ''): self
    {
        $this->message = new Definition\Message($messageText, $messageId);
        return $this;
    }

    public function level(string $level): self
    {
        $this->level = $level;
        return $this;
    }

    public function descriptor(Descriptor $descriptor): self
    {
        $this->descriptor = $descriptor->build();
        return $this;
    }

    public function exception(Exception $exception): self
    {
        $this->exception = $exception->build();
        return $this;
    }

    /**
     * Builds a valued instance of Notification definition.
     */
    public function build(): Definition\Notification
    {
        $notification = new Definition\Notification($this->message);
        $this->populate($notification);
        return $notification;
    }
}
