<?php

declare(strict_types=1);

namespace App\Http\Resources\Language;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class LanguageResourceCollection
 * @package App\Http\Resources\Language
 */
class LanguageResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return LanguageResource
     */
    protected function getItemData($item): LanguageResource
    {
        return new LanguageResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
