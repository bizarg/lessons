<?php

namespace App\Domain\Core;

use Bizarg\Order\Order as BaseOrder;
use Bizarg\Repository\Contract\Order as InterfaceOrder;

/**
 * Class Order
 * @package App\Domain\Core
 */
class Order extends BaseOrder implements InterfaceOrder
{
}
