<?php

namespace App\Service;

use App\Repository\LoginRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    private $loginRepository;

    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function loginService($request)
    {
        $email = $request->email;
        $user = $this->loginRepository->getUserByEmail($email);
        $checkPass = Hash::check($request->password, $user->password);
        if ($user != null && $checkPass == true) {
            Auth::login($user);
            return true;
        } else {
            return false;
        }
    }
}
