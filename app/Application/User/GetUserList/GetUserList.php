<?php

declare(strict_types=1);

namespace App\Application\User\GetUserList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\User\UserFilter;
use Rosamarsky\CommandBus\Command;

/**
 * Class GetUserList
 * @package App\Application\User\GetUserList
 */
class GetUserList implements Command
{
    /** @var Pagination */
    private Pagination $pagination;
    /** @var UserFilter|null */
    private ?UserFilter $filter;
    /** @var Order|null */
    private ?Order $order;

    /**
     * GetUserList constructor.
     * @param Pagination $pagination
     * @param UserFilter|null $filter
     * @param Order|null $order
     */
    public function __construct(Pagination $pagination, UserFilter $filter = null, Order $order = null)
    {
        $this->pagination = $pagination;
        $this->filter = $filter;
        $this->order = $order;
    }

    /** @return Pagination */
    public function pagination(): Pagination
    {
        return $this->pagination;
    }

    /** @return UserFilter|null */
    public function filter(): ?UserFilter
    {
        return $this->filter;
    }

    /** @return Order|null */
    public function order(): ?Order
    {
        return $this->order;
    }
}
