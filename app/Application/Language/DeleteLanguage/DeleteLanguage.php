<?php

declare(strict_types=1);

namespace App\Application\Language\DeleteLanguage;

use App\Domain\Language\Language;
use ItDevgroup\CommandBus\Command;

/**
 * Class DeleteLanguage
 * @package App\Application\Language
 */
class DeleteLanguage implements Command
{
    /** @var Language */
    private Language $language;

    /**
     * DeleteLanguage constructor.
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    /** @return Language */
    public function language(): Language
    {
        return $this->language;
    }
}
