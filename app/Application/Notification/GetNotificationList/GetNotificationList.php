<?php

declare(strict_types=1);

namespace App\Application\Notification\GetNotificationList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Notification\NotificationFilter;
use Rosamarsky\CommandBus\Command;

/**
 * Class GetNotificationList
 * @package App\Application\Notification\GetNotificationList
 */
class GetNotificationList implements Command
{
    /**
     * @var NotificationFilter|null
     */
    private ?NotificationFilter $filter;
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
     * @param NotificationFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(NotificationFilter $filter = null, Pagination $pagination = null, Order $order = null)
    {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return NotificationFilter|null
     */
    public function filter(): ?NotificationFilter
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
