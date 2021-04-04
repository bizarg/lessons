<?php

declare(strict_types=1);

namespace App\Application\Permission\GetPermissionList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Permission\PermissionFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetPermissionList
 * @package App\Application\Permission\GetPermissionList
 */
class GetPermissionList implements Command
{
    /**
     * @var PermissionFilter|null
     */
    private ?PermissionFilter $filter;
    /**
     * @var Pagination|null
     */
    private ?Pagination $pagination;
    /**
     * @var Order|null
     */
    private ?Order $order;

    /**
     * GetPermissionList constructor.
     * @param PermissionFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(
        PermissionFilter $filter = null,
        Pagination $pagination = null,
        Order $order = null
    ) {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return PermissionFilter|null
     */
    public function filter(): ?PermissionFilter
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
