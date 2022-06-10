<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\ChatMessage
 *
 * @property int $id
 * @property int $user_id
 * @property int $chat_id
 * @property string $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ChatMessage newModelQuery()
 * @method static Builder|ChatMessage newQuery()
 * @method static Builder|ChatMessage query()
 * @method static Builder|ChatMessage whereChatId($value)
 * @method static Builder|ChatMessage whereCreatedAt($value)
 * @method static Builder|ChatMessage whereId($value)
 * @method static Builder|ChatMessage whereMessage($value)
 * @method static Builder|ChatMessage whereUpdatedAt($value)
 * @method static Builder|ChatMessage whereUserId($value)
 * @mixin Eloquent
 * @property-read \App\Models\Chat $chat
 * @property-read \App\Models\User|null $user
 */
class ChatMessage extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

}
