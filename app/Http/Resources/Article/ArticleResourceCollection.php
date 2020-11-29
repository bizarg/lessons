<?php

declare(strict_types=1);

namespace App\Http\Resources\Article;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class ArticleResourceCollection
 * @package App\Http\Resources\Article
 */
class ArticleResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return ArticleResource
     */
    protected function getItemData($item): ArticleResource
    {
        return new ArticleResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return 'articles.index';
    }
}
