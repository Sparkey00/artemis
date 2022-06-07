<?php

namespace App\Http\Interfaces;

interface UserServiceInterface
{
    function search(array $params = []);
    function searchMatches();
    function processLike(int $likedUserId);
}
