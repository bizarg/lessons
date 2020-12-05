<?php

declare(strict_types=1);

namespace App\Application\User\GetUserList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\User\UserFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetUserList
 * @package App\Application\User\GetUserList
 */
class GetUserList implements Command
{
    /**
     * @var UserFilter|null
     */
    private ?UserFilter $filter;
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
     * @param UserFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(UserFilter $filter = null, Pagination $pagination = null, Order $order = null)
    {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return UserFilter|null
     */
    public function filter(): ?UserFilter
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
