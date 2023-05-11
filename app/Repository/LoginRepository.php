<?php

namespace App\Repository;

use App\Models\User;

class LoginRepository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getUserByEmail($email)
    {
        return $this->user = User::where('email', $email)->first();
    }
}
