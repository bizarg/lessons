<?php

declare(strict_types=1);

namespace App\Http\Resources\Room;

use App\Domain\Room\Room;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RoomResource
 * @package App\Http\Resources\Room
 */
class RoomResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Room $this */

        $response = [
            'type' => 'room',
            'id' => $this->id,
            'title' => $this->title,
            'attributes' => [
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
        ];

        $response['relationships']['data']['user'] = new UserResource($this->user);

        foreach ($this->members as $member) {
            $response['relationships']['data']['members'] = new UserResource($member);
        }

        return $response;
    }
}
