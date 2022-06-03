<?php

namespace App\Http\Services;

use App\Http\Interfaces\SearchServiceInterface;
use App\Models\Chat;
use App\Models\ChatUser;

class ChatService implements SearchServiceInterface
{
    /**
     * @param int $likedUserId
     * @param int $userId
     * @return void
     * @throws \Throwable
     */
    public static function createNewChat(int $likedUserId, int $userId)
    {
        \DB::beginTransaction();
        try {
            $chat = Chat::create(['status' => Chat::STATUS_ACTIVE]);
            $chat->save();
            $data = [
                [
                    'user_id'=> $likedUserId,
                    'chat_id' => $chat->id,
                ],
                [
                    'user_id'=> $userId,
                    'chat_id' => $chat->id,
                ]
            ];

            foreach ($data as $datum) {
                ChatUser::create($datum);
            }

            \DB::commit();
        }catch (\Throwable $exception) {
            dd($exception);
            \DB::rollBack();
            \Log::debug($exception);
        }


    }

    /**
     * @param array $params
     * @return void
     */
    public function search(array $params = [])
    {
        // TODO: Implement search() method.
    }
}
