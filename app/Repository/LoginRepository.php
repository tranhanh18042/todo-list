<?php

namespace App\Repository;

use App\Models\User;

class LoginRepository
{
    /**
     * @var $user
     */
    protected $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $email
     */
    public function getUserByEmail($email)
    {
        return $this->user = User::where('email', $email)->first();
    }
}
