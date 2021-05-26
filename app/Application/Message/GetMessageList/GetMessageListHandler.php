<?php

declare(strict_types=1);

namespace App\Application\Message\GetMessageList;

use App\Domain\Message\MessageRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetMessageListHandler
 * @package App\Application\Message\GetMessageList
 */
class GetMessageListHandler implements Handler
{
    /**
     * @var MessageRepository
     */
    private MessageRepository $messageRepository;

    /**
     * GetMessageListHandler constructor.
     * @param MessageRepository $messageRepository
     */
    public function __construct(
        MessageRepository $messageRepository
    ) {
        $this->messageRepository = $messageRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetMessageList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->messageRepository
        	->setFilter($command->filter())
        	->setOrder($command->order())
        	->pagination($command->pagination());
    }
}
