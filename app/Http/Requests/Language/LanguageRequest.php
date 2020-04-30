<?php

declare(strict_types=1);

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LanguageRequest
 * @package App\Http\Requests\Language
 */
class LanguageRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}
