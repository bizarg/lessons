<?php

declare(strict_types=1);

namespace App\Http\Resources\Category;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class CategoryResourceCollection
 * @package App\Http\Resources\Category
 */
class CategoryResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return CategoryResource
     */
    protected function getItemData($item): CategoryResource
    {
        return new CategoryResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
