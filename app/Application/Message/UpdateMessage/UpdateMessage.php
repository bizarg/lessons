<?php

declare(strict_types=1);

namespace App\Application\Message\UpdateMessage;

use App\Domain\Message\Message;
use App\Http\Requests\Message\UpdateMessageRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class UpdateMessage
 * @package App\Application\Message\UpdateMessage
 */
class UpdateMessage implements Command
{
    /**
     * @var Message
     */
    private Message $message;

    /**
     * UpdateMessage constructor.
     * @param Message $message
     */
    public function __construct(
        Message $message
    ) {
        $this->message = $message;
    }

    /**
     * @param Request|UpdateMessageRequest $request
     * @param Message $message
     * @return self
     */
    public static function fromRequest(Request $request, Message $message): self
    {
        return (new self(
            $message
        ));
    }

    /**
     * @return Message
     */
    public function message(): Message
    {
        return $this->message;
    }
}
