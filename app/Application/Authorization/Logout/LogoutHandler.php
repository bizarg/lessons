<?php

namespace App\Application\Authorization\Logout;

use Laravel\Passport\Token;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class LogoutHandler
 * @package App\Application\Authorization\Logout
 */
class LogoutHandler implements Handler
{

    /**
     * Handle a Command object
     *
     * @param Command|Logout $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        /** @var Token $token */
        $token = auth('api')->user()->token();
        if ($token) {
            $token->revoke();
        }
    }
}
