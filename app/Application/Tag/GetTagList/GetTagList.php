<?php

declare(strict_types=1);

namespace App\Application\Tag\GetTagList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Tag\TagFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetTagList
 * @package App\Application\Tag\GetTagList
 */
class GetTagList implements Command
{
    /**
     * @var TagFilter|null
     */
    private ?TagFilter $filter;
    /**
     * @var Pagination|null
     */
    private ?Pagination $pagination;
    /**
     * @var Order|null
     */
    private ?Order $order;

    /**
     * GetLeadStatusList constructor.
     * @param TagFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(TagFilter $filter = null, Pagination $pagination = null, Order $order = null)
    {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return TagFilter|null
     */
    public function filter(): ?TagFilter
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
