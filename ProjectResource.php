<?php

declare(strict_types=1);

namespace Api\Http\Resources\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProjectResource
 * @package Api\Http\Resources\Project
 */
class ProjectResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $response = [
            'type' => 'project',
            'id' => $this->id,
            'attributes' => [
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
        ];

        return $response;
    }
}
