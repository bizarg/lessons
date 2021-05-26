<?php

declare(strict_types=1);

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class MessageRequest
 * @package App\Http\Requests\Message
 */
class StoreMessageRequest extends FormRequest
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
            'text' => 'required|string|max:65000',
            'room' => [
                'required',
                Rule::exists('rooms')
            ]
        ];
    }
}
