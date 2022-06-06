<?php

namespace App\Http\Services;

use App\Http\Interfaces\SearchServiceInterface;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\ChatUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;

class ChatService implements SearchServiceInterface
{

    private Authenticatable $user;

    /**
     * @param Authenticatable $user
     */
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * @param int $likedUserId
     * @param int $userId
     * @return void
     * @throws \Throwable
     */
    public static function createNewChat(int $likedUserId, int $userId): void
    {
        \DB::beginTransaction();
        try {
            $chat = Chat::create(['status' => Chat::STATUS_ACTIVE]);
            $chat->save();
            $data = [
                [
                    'user_id' => $likedUserId,
                    'chat_id' => $chat->id,
                ],
                [
                    'user_id' => $userId,
                    'chat_id' => $chat->id,
                ]
            ];

            foreach ($data as $datum) {
                ChatUser::create($datum);
            }
            \DB::commit();
        } catch (\Throwable $exception) {
            \DB::rollBack();
            \Log::debug($exception);
        }


    }

    /**
     * @param array $params
     * @return Collection
     */
    public function search(array $params = []): Collection
    {
        return $this->findByUserId($this->user->id);
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

    /**
     * @param array $post
     * @return mixed
     */
    public function sendMessage( array $post): mixed
    {
        return ChatMessage::create([
            'chat_id' => $post['chatId'],
            'user_id' => $this->user->id,
            'message' => $post['message']
        ]);
    }
}
