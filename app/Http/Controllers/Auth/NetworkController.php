<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\UseCases\Auth\NetworkService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class NetworkController
 * @package App\Http\Controllers\Auth
 */
class NetworkController extends Controller
{
    private $service;

//    /**
//     * NetworkController constructor.
//     * @param NetworkService $service
//     */
//    public function __construct(NetworkService $service)
//    {
//        $this->service = $service;
//    }

    /**
     * @param string $network
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect(string $network)
    {
        return Socialite::driver($network)->redirect();
    }

    /**
     * @param string $network
     * @return void
     */
    public function callback(string $network)
    {
        $data = Socialite::driver($network)->user();

//        try {
//            $user = $this->service->auth($network, $data);
//            Auth::login($user);
//            return redirect()->intended();
//        } catch (\DomainException $e) {
//            return redirect()->route('login')->with('error', $e->getMessage());
//        }
    }
}
