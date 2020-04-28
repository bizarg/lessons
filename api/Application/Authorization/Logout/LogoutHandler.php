<?php

namespace Api\Application\Authorization\Logout;

use Laravel\Passport\Token;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class LogoutHandler
 * @package App\Api\V1\Application\Auth
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
