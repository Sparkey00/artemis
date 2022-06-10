<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Carbon;

/**
 * App\Models\Chat
 *
 * @property int $id
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Chat newModelQuery()
 * @method static Builder|Chat newQuery()
 * @method static Builder|Chat query()
 * @method static Builder|Chat whereCreatedAt($value)
 * @method static Builder|Chat whereId($value)
 * @method static Builder|Chat whereStatus($value)
 * @method static Builder|Chat whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChatMessage[] $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 */
class Chat extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 1;
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'chat_users');
    }
}
