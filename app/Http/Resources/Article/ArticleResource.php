<?php

declare(strict_types=1);

namespace App\Http\Resources\Article;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ArticleResource
 * @package App\Http\Resources\Article
 */
class ArticleResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $response = [
            'type' => 'article',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'slug' => $this->slug,
                'body' => $this->body,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
        ];

        $response['attributes']['relationships']['author'] = new UserResource($this->author);

        return $response;
    }
}
