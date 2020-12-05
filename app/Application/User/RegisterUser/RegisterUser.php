<?php

declare(strict_types=1);

namespace App\Application\User\RegisterUser;

use App\Http\Requests\User\UserRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class RegisterUser
 * @package App\Application\User
 */
class RegisterUser implements Command
{
    /**
     * RegisterUser constructor.
     */
    public function __construct(
    ) {
    }

    /**
     * @param Request|UserRequest $request
     * @return RegisterUser
     */
    public static function fromRequest(Request $request)
    {
        return (new self(
        ));
    }
}
