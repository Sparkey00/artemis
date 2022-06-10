<?php

namespace App\Http\Services;

use App\Http\Interfaces\UserServiceInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Redis;

class UserService implements UserServiceInterface
{
    private Authenticatable $user;
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * @param int $likedUserId
     * @return bool If Matched
     * @throws \Throwable
     */
    public function processLike(int $likedUserId): bool
    {
        Redis::set($this->likeKey($likedUserId, $this->user->id), true,'ex', 60 * 10);

        $isLiked = Redis::get($this->likeKey($likedUserId, $this->user->id));
        if($isLiked) {
            ChatService::createNewChat($likedUserId, $this->user->id);
        } else {
            Redis::set($this->likeKey( $this->user->id,$likedUserId), true, 'ex', 60 * 10);
        }

        return $isLiked;
    }

    private function likeKey(int $userId, int $likedUserId): string
    {
        return $userId. 'l' . $likedUserId;
    }

}
