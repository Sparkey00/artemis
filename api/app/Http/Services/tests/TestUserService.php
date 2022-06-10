<?php

namespace App\Http\Services\tests;

use App\Http\Interfaces\UserServiceInterface;
use App\Models\User;

class TestUserService implements UserServiceInterface
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function search(array $params = [])
    {
        return User::where('id', '=', $this->user->id)->get();
    }

    function searchMatches()
    {
        // TODO: Implement searchMatches() method.
    }

    function processLike(int $likedUserId)
    {
        // TODO: Implement processLike() method.
    }
}
