<?php

declare(strict_types=1);

namespace App\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class SkillRequest
 * @package App\Http\Requests\Skill
 * @property $title
 * @property $description
 */
class UpdateSkillRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('skills', 'title')->ignore($this->route('skill')->id)
            ],
            'description' => 'nullable|string|max:65000'
        ];
    }
}
