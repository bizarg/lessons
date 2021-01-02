<?php

declare(strict_types=1);

namespace App\Http\Resources\Skill;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SkillResource
 * @package App\Http\Resources\Skill
 */
class SkillResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $response = [
            'type' => 'skill',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
        ];

        return $response;
    }
}
