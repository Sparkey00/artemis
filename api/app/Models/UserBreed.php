<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserBreed
 *
 * @property int $id
 * @property int $user_id
 * @property int $breed_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserBreed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBreed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBreed query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBreed whereBreedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBreed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBreed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBreed whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBreed whereUserId($value)
 * @mixin \Eloquent
 */
class UserBreed extends Model
{
    use HasFactory;
}
