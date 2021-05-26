<?php

declare(strict_types=1);

namespace App\Http\Resources\Message;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class MessageResource
 * @package App\Http\Resources\Message
 */
class MessageResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $response = [
            'type' => 'message',
            'id' => $this->id,
            'attributes' => [
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
        ];

        return $response;
    }
}
