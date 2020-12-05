<?php

namespace App\Http\Controllers;

use App\Domain\User\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\CommandBus;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /** @var CommandBus */
    private CommandBus $dispatcher;

    /**
     * Controller constructor.
     * @param CommandBus $dispatcher
     */
    public function __construct(
        CommandBus $dispatcher
    ) {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Command $command
     * @return mixed
     */
    protected function dispatchCommand(Command $command)
    {
        return $this->dispatcher->execute($command);
    }

    /**
     * @return User
     */
    protected function user()
    {
        return request()->user();
    }
}
