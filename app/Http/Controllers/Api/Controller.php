<?php

namespace App\Http\Controllers\Api;

use App\Domain\User\User;

use App\Http\Controllers\Controller as BaseController;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    /**
     * @return User
     */
    protected function user()
    {
        return request()->user('api');
    }
}
