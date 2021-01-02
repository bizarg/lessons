<?php

declare(strict_types=1);

namespace App\Application\Category\GetCategoryList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Category\CategoryFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetCategoryList
 * @package App\Application\Category\GetCategoryList
 */
class GetCategoryList implements Command
{
    /**
     * @var CategoryFilter|null
     */
    private ?CategoryFilter $filter;
    /**
     * @var Pagination|null
     */
    private ?Pagination $pagination;
    /**
     * @var Order|null
     */
    private ?Order $order;

    /**
     * GetCategoryList constructor.
     * @param CategoryFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(
        CategoryFilter $filter = null,
        Pagination $pagination = null,
        Order $order = null
    ) {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return CategoryFilter|null
     */
    public function filter(): ?CategoryFilter
    {
        return $this->filter;
    }

    /**
     * @return Pagination|null
     */
    public function pagination(): ?Pagination
    {
        return $this->pagination;
    }

    /**
     * @return Order|null
     */
    public function order(): ?Order
    {
        return $this->order;
    }
}
