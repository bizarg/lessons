<?php

declare(strict_types=1);

namespace App\Application\Language\UpdateLanguage;

use App\Domain\Language\Language;
use App\Http\Requests\Language\LanguageRequest;
use Illuminate\Http\Request;
use Rosamarsky\CommandBus\Command;

/**
 * Class UpdateLanguage
 * @package App\Application\Language\UpdateLanguage
 */
class UpdateLanguage implements Command
{
    /** @var Language */
    private Language $language;

    /**
     * UpdateLanguage constructor.
     * @param Language $language
     */
    public function __construct(
        Language $language
    ) {
        $this->language = $language;
    }

    /**
     * @param Request|LanguageRequest $request
     * @param Language $language
     * @return self
     */
    public static function fromRequest(Request $request, Language $language): self
    {
        return (new self(
        	$language
        ));
    }

    /** @return Language */
    public function language(): Language
    {
        return $this->language;
    }
}
