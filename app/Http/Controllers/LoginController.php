<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Service\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index()
    {
        return view('login');
    }
    public function login(LoginRequest $request)
    {
        $rs = $this->loginService->loginService($request);
        if ($rs == true) {
            return view('welcome');
        } else {
            return redirect()->back();
        }
    }
}
