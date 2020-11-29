<?php

declare(strict_types=1);

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class ArticleRequest
 * @package App\Http\Requests\Article
 * @property string $title
 * @property string $body
 * @property int $author
 * @property array|null $tags
 */
class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|array|translate',
            'body' => 'required|array|translate',
            'author' => [
                'nullable',
                'integer',
                Rule::exists('users')
            ],
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|string|max:40'
        ];
    }
}
