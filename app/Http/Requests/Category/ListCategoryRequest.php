<?php

declare(strict_types=1);

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CategoryRequest
 * @package App\Http\Requests\Category
 */
class ListCategoryRequest extends FormRequest
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
            'sort' => 'nullable|string|max:191',
            'page' => 'nullable|array',
            'page.number' => 'nullable|numeric',
            'page.size' => 'nullable|numeric',
            'filter' => 'nullable|array',
            'filter.query' => 'nullable|string|max:191',
        ];
    }
}
