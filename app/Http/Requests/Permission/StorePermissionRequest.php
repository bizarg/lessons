<?php

declare(strict_types=1);

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PermissionRequest
 * @package App\Http\Requests\Permission
 * @property $name
 * @property $guardName
 */
class StorePermissionRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'guardName' => 'required|string|max:255'
        ];
    }
}
