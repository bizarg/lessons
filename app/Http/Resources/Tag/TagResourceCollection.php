<?php

declare(strict_types=1);

namespace App\Http\Resources\Tag;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class TagResourceCollection
 * @package App\Http\Resources\Tag
 */
class TagResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return TagResource
     */
    protected function getItemData($item): TagResource
    {
        return new TagResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
