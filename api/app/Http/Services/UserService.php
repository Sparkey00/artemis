<?php

namespace App\Http\Services;

use App\Http\Interfaces\SearchServiceInterface;
use App\Http\Interfaces\UserServiceInterface;
use App\Models\User;
use DateTime;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redis;

class UserService implements SearchServiceInterface, UserServiceInterface
{
    private Authenticatable $user;
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * @return Collection|array
     */
    public function searchMatches(): Collection|array
    {
        $settings = $this->user->settings;

        $dateTo = (new DateTime('now'))->modify(('-' . $settings->age_from . ' years'));
        $dateFrom = (new DateTime('now'))->modify(('-' . $settings->age_to . ' years'));
        return User::query()
            ->leftJoin('user_settings', 'user_id', '=', 'users.id')
            ->whereDate('date_of_birth', '>=', $dateFrom->format('Y-m-d H:i:s'))
            ->whereDate('date_of_birth', '<=', $dateTo->format('Y-m-d H:i:s'))
            ->whereIn('gender', User::getGendersForSearch($this->user->gender))
            ->get();
    }

    /**
     * @param array $params
     * @return Collection|array
     */
    public function search(array $params = []): Collection|array
    {
        $query = User::query();

        foreach ($params as $name => $param) {
            $query->where($name, '=', $param);
        }

        return $query->get();
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
