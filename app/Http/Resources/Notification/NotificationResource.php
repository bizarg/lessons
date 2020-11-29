<?php

declare(strict_types=1);

namespace App\Http\Resources\Notification;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/**
 * Class NotificationResource
 * @package App\Http\Resources\Notification
 */
class NotificationResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'type' => 'notification',
            'id' => $this->id,
            'attributes' => [
                'data' => json_decode($this->data),
                'isRead' => (bool)$this->read_at,
                'readAt' => $this->read_at,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
        ];
    }
}
