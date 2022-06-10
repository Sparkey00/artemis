<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\ChatRepositoryInterface;
use App\Models\Chat;
use App\Models\ChatUser;
use Illuminate\Support\Collection;

class ChatRepository extends BaseRepository implements ChatRepositoryInterface
{
    public function __construct()
    {
        $this->modelClass = Chat::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByPK($id)
    {
        return Chat::firstOrFail($id);
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function findByUserId(int $userId): Collection
    {
        return Chat::query()->with('users', 'messages')
            ->wherein(
                'id',
                ChatUser::select('chat_id')->where('user_id', '=', $userId)
            )
            ->get();
    }
}
