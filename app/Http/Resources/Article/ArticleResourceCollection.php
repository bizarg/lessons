<?php

namespace App\Http\Resources\Article;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ArticleResourceCollection
 * @package Api\Http\Resources\Article
 */
class ArticleResourceCollection extends ResourceCollection
{
    /**
     * @param object $item
     * @return ArticleResource
     */
    protected function getItemData($item): ArticleResource
    {
        return new ArticleResource($item);
    }
}
