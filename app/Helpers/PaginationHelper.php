<?php

namespace App\Helpers;

class PaginationHelper
{
    /**
     * @param int $page
     * @param int $perPage
     * @param string $routeName
     * @param int $totalItems
     * @param array $routeParams
     * @return array
     */
    public function links($page, $perPage, $routeName, $totalItems, $routeParams = [])
    {
        $totalPages = $this->totalPages($totalItems, $perPage);

        $links = [
            'self' => route($routeName, array_merge([
                'page[number]' => $page,
                'page[size]' => $perPage
            ], $routeParams)),
            'first' => route($routeName, array_merge([
                'page[number]' => 1,
                'page[size]' => $perPage
            ], $routeParams)),
            'last' => route($routeName, array_merge([
                'page[number]' => $totalPages,
                'page[size]' => $perPage
            ], $routeParams))
        ];

        if ($page != 1) {
            $links['prev'] = route($routeName, array_merge([
                'page[number]' => $page - 1,
                'page[size]' => $perPage
            ], $routeParams));
        }
        if ($page != $totalPages) {
            $links['next'] = route($routeName, array_merge([
                'page[number]' => $page + 1,
                'page[size]' => $perPage
            ], $routeParams));
        }
        return $links;
    }

    /**
     * @param int $perPage
     * @param int $totalItems
     * @return float
     */
    public function totalPages($totalItems, $perPage)
    {
        if (!$perPage) {
            return 1;
        }
        return (int)ceil($totalItems / $perPage);
    }
}
