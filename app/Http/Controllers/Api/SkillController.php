<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Skill\DeleteSkill\DeleteSkill;
use App\Application\Skill\GetSkillList\GetSkillList;
use App\Application\Skill\StoreSkill\StoreSkill;
use App\Application\Skill\UpdateSkill\UpdateSkill;
use App\Domain\Skill\Skill;
use App\Http\Requests\Skill\ListSkillRequest;
use App\Http\Requests\Skill\StoreSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;
use App\Http\Resources\Skill\SkillResource;
use App\Http\Resources\Skill\SkillResourceCollection;
use App\Domain\Skill\SkillFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class SkillController
 * @package App\Http\Controllers\Api
 */
class SkillController extends Controller
{
    /**
     * @param ListSkillRequest $request
     * @return JsonResponse
     */
    public function index(ListSkillRequest $request): JsonResponse
    {
        $order = Order::fromRequest($request, Skill::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);
        $filter = SkillFilter::fromRequest($request);

        $skills = $this->dispatchCommand(new GetSkillList($filter, $pagination, $order));

        return new JsonResponse(
            new SkillResourceCollection($skills)
        );
    }

    /**
     * @param StoreSkillRequest $request
     * @return JsonResponse
     */
    public function store(StoreSkillRequest $request): JsonResponse
    {
        $skill = $this->dispatchCommand(StoreSkill::fromRequest($request));

        return new JsonResponse([
            'data' => new SkillResource($skill)
        ], Response::HTTP_CREATED);
    }

    /**
     * @param UpdateSkillRequest $request
     * @param Skill $skill
     * @return JsonResponse
     */
    public function update(UpdateSkillRequest $request, Skill $skill): JsonResponse
    {
        $skill = $this->dispatchCommand(UpdateSkill::fromRequest($request, $skill));

        return new JsonResponse([
            'data' => new SkillResource($skill)
        ]);
    }

    /**
     * @param Skill $skill
     * @return JsonResponse
     */
    public function show(Skill $skill): JsonResponse
    {
        return new JsonResponse([
            'data' => new SkillResource($skill)
        ]);
    }

    /**
     * @param Skill $skill
     * @return JsonResponse
     */
    public function destroy(Skill $skill): JsonResponse
    {
        $this->dispatchCommand(new DeleteSkill($skill));

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
