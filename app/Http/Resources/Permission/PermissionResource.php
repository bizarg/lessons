<?php

declare(strict_types=1);

namespace App\Http\Resources\Permission;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PermissionResource
 * @package App\Http\Resources\Permission
 */
class PermissionResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $response = [
            'type' => 'permission',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'guardName' => $this->guard_name,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
        ];

        return $response;
    }
}
