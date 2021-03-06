<?php

namespace Tests;

use App\Domain\User\User;
use Bizarg\Test\TestAbstract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends TestAbstract
{
    /**
     * @return Authenticatable|null|User
     */
    public function user()
    {
        return Auth::user();
    }
}
