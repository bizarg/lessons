<?php

declare(strict_types=1);

namespace Api\Http\Resources\Project;

use Api\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class ProjectResourceCollection
 * @package Api\Http\Resources\Project
 */
class ProjectResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return ProjectResource
     */
    protected function getItemData($item): ProjectResource
    {
        return new ProjectResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
