<?php

declare(strict_types=1);

namespace App\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SkillRequest
 * @package App\Http\Requests\Skill
 * @property $title
 * @property $description
 */
class StoreSkillRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:65000',
        ];
    }
}
