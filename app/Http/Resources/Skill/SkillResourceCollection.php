<?php

declare(strict_types=1);

namespace App\Http\Resources\Skill;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class SkillResourceCollection
 * @package App\Http\Resources\Skill
 */
class SkillResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return SkillResource
     */
    protected function getItemData($item): SkillResource
    {
        return new SkillResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
