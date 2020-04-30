<?php

namespace App\Rules;

use App\Domain\Language\LanguageRepository;
use Illuminate\Validation\Factory;

class Translate
{
    /**
     * @var LanguageRepository
     */
    private LanguageRepository $languageRepository;
    /**
     * @var Factory
     */
    private Factory $validator;

    /**
     * Create a new rule instance.
     *
     * @param LanguageRepository $languageRepository
     * @param Factory $validator
     */
    public function __construct(
        LanguageRepository $languageRepository,
        Factory $validator
    ) {
        $this->languageRepository = $languageRepository;
        $this->validator = $validator;
    }

    /**
     * @param $message
     * @param $value
     * @param $rule
     * @param $parameters
     * @return bool
     */
    public function validate($message, $value, $rule, $parameters)
    {
        $languages = $this->languageRepository->collection();

        $errors = [];
        foreach ($languages as $language) {
            if (!isset($value[$language->code])) {
                $errors[] = $language->code;
                continue;
            }
        };

        if (count($errors)) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public static function message()
    {
        return __('validation.translate_required');
    }
}
