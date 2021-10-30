<?php declare(strict_types=1);

namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Message;

trait MessageString
{
    /**
     * @var Message
     */
    protected $message;

    /**
     * @param Message $message
     */
    public function setMessage(Message $message): void
    {
        $this->message = $message;
    }
}
