<?php

declare(strict_types=1);

namespace App\Http\Resources\Message;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class MessageResourceCollection
 * @package App\Http\Resources\Message
 */
class MessageResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return MessageResource
     */
    protected function getItemData($item): MessageResource
    {
        return new MessageResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
