<?php

declare(strict_types=1);

namespace App\Application\Role\GetRoleList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Role\RoleFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetRoleList
 * @package App\Application\Role\GetRoleList
 */
class GetRoleList implements Command
{
    /**
     * @var RoleFilter|null
     */
    private ?RoleFilter $filter;
    /**
     * @var Pagination|null
     */
    private ?Pagination $pagination;
    /**
     * @var Order|null
     */
    private ?Order $order;

    /**
     * GetRoleList constructor.
     * @param RoleFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(
        RoleFilter $filter = null,
        Pagination $pagination = null,
        Order $order = null
    ) {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return RoleFilter|null
     */
    public function filter(): ?RoleFilter
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
