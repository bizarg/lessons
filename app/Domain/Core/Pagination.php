<?php

namespace App\Domain\Core;

use Bizarg\Pagination\Pagination as BasePagination;
use Bizarg\Repository\Contract\Pagination as InterfacePagination;

/**
 * Class Pagination
 * @package App\Domain\Core
 */
class Pagination extends BasePagination implements InterfacePagination
{
}
