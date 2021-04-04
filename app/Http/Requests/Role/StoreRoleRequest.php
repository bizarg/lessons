<?php

declare(strict_types=1);

namespace App\Http\Requests\Role;

use App\Domain\Permission\Permission;
use App\Domain\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class RoleRequest
 * @package App\Http\Requests\Role
 * @property $name
 * @property $guardName
 * @property $permissions
 */
class StoreRoleRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        /** @var User $user */
        $user = $this->user();
        $user->can(Permission::ROLE_STORE);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'guardName' => 'required|string',
            'permissions' => 'nullable|array',
            'permissions.*' => [
                'integer',
                Rule::exists('permissions', 'id')
            ]
        ];
    }
}
