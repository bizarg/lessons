<?php

declare(strict_types=1);

namespace App\Application\Tag\RegisterTag;

use App\Http\Requests\Tag\TagRequest;
use Illuminate\Http\Request;
use Rosamarsky\CommandBus\Command;

/**
 * Class RegisterTag
 * @package App\Application\Tag
 */
class RegisterTag implements Command
{
    /**
     * RegisterTag constructor.
     */
    public function __construct(
    ) {
    }

    /**
     * @param Request|TagRequest $request
     * @return RegisterTag
     */
    public static function fromRequest(Request $request)
    {
        return (new self(
        ));
    }
}
