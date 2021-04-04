<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateUserRoleRequest
 * @package App\Http\Requests\User
 * @property $roles
 */
class UpdateUserRoleRequest extends FormRequest
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
            'roles' => 'nullable|array',
            'roles.*' => [
                'integer',
//                Rule::exists('roles', 'id')
            ]
        ];
    }
}
