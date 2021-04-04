<?php

declare(strict_types=1);

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PermissionRequest
 * @package App\Http\Requests\Permission
 */
class UpdatePermissionRequest extends StorePermissionRequest
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
        return parent::rules();
    }
}
