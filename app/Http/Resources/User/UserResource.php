<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use App\Http\Resources\Skill\SkillResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package App\Http\Resources\User
 */
class UserResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $response = [
            'type' => 'user',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
        ];

        if ($this->skills) {
            foreach ($this->skills as $skill) {
                $response['relationships']['skills']['data'] = new SkillResource($skill);
            }
        }

        return $response;
    }
}
