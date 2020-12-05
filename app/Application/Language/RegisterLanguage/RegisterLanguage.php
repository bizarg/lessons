<?php

declare(strict_types=1);

namespace App\Application\Language\RegisterLanguage;

use App\Http\Requests\Language\LanguageRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class RegisterLanguage
 * @package App\Application\Language
 */
class RegisterLanguage implements Command
{
    /**
     * RegisterLanguage constructor.
     */
    public function __construct(
    ) {
    }

    /**
     * @param Request|LanguageRequest $request
     * @return RegisterLanguage
     */
    public static function fromRequest(Request $request)
    {
        return (new self(
        ));
    }
}
