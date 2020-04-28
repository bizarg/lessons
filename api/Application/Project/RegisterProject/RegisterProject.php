<?php

declare(strict_types=1);

namespace Api\Application\Project\RegisterProject;

use Api\Http\Requests\Project\ProjectRequest;
use Illuminate\Http\Request;
use Rosamarsky\CommandBus\Command;

/**
 * Class RegisterProject
 * @package App\Application\Project
 */
class RegisterProject implements Command
{
    /**
     * RegisterProject constructor.
     */
    public function __construct(
    ) {
    }

    /**
     * @param Request|ProjectRequest $request
     * @return RegisterProject
     */
    public static function fromRequest(Request $request)
    {
        return (new self(
        ));
    }
}
