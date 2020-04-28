<?php

declare(strict_types=1);

namespace Api\Http\Controllers;

use Api\Application\Project\DeleteProject\DeleteProject;
use Api\Application\Project\GetProjectList\GetProjectList;
use Api\Application\Project\RegisterProject\RegisterProject;
use Api\Application\Project\UpdateProject\UpdateProject;
use Api\Domain\Project\Project;
use Api\Http\Requests\Project\ProjectRequest;
use Api\Http\Resources\Project\ProjectResource;
use Api\Http\Resources\Project\ProjectResourceCollection;
use Api\Domain\Project\ProjectFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ProjectController
 * @package Api\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filter = ProjectFilter::fromRequest($request);
        $order = Order::fromRequest($request, Project::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);

        $projects = $this->dispatch(new GetProjectList($filter, $pagination, $order));

        return response()->json(new ProjectResourceCollection($projects), Response::HTTP_OK);
    }

    /**
     * @param ProjectRequest $request
     * @return JsonResponse
     */
    public function store(ProjectRequest $request): JsonResponse
    {
        $project = $this->dispatch(RegisterProject::fromRequest($request));

        return response()->json(['data' => new ProjectResource($project)], Response::HTTP_CREATED);
    }

    /**
     * @param ProjectRequest $request
     * @param Project $project
     * @return JsonResponse
     */
    public function update(ProjectRequest $request, Project $project): JsonResponse
    {
        $project = $this->dispatch(UpdateProject::fromRequest($request, $project));

        return response()->json([
            'data' => new ProjectResource($project)
        ], Response::HTTP_OK);
    }

	/**
     * @param Project $project
     * @return JsonResponse
     */
    public function show(Project $project): JsonResponse
    {
        return response()->json(['data' => new ProjectResource($project)]);
    }

    /**
     * @param Project $project
     * @return JsonResponse
     */
    public function destroy(Project $project): JsonResponse
    {
        $this->dispatch(new DeleteProject($project));

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
