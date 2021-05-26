<?php

declare(strict_types=1);

namespace App\Application\Message\StoreMessage;

use App\Domain\Message\Message;
use App\Domain\Message\MessageRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class StoreMessageHandler
 * @package App\Application\Message
 */
class StoreMessageHandler implements Handler
{
    /**
     * @var MessageRepository
     */
    private MessageRepository $messageRepository;

    /**
     * StoreMessageHandler constructor.
     * @param MessageRepository $messageRepository
     */
    public function __construct(
        MessageRepository $messageRepository
    ) {
        $this->messageRepository = $messageRepository;
    }

    /**
     * @param Command|StoreMessage $command
     * @return Message
     */
    public function handle(Command $command): Message
    {
        $message = Message::register();

        $this->messageRepository->store($message);

        return $message;
    }
}
