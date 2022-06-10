<?php

namespace App\Http\Interfaces;

interface UserServiceInterface
{
    function processLike(int $likedUserId);
}
