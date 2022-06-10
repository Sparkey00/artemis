<?php

namespace App\Models;

use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Psy\Util\Json;

/**
 * App\Models\UserSetting
 *
 * @property int $user_id
 * @property int $radius_meters
 * @property mixed $pref_breeds
 * @property int $age_from
 * @property int $age_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereAgeFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereAgeTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting wherePrefBreeds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereRadiusMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User $user
 */
class UserSetting extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];

    protected $primaryKey = 'user_id';

    /**
     * @param User $user
     * @return void
     * @throws \Exception
     */
    public static function createDefault(User $user): void
    {
        if(is_string($user->date_of_birth)) {
            $age = $user->getAge();
        } else {
            $age = $user->date_of_birth
                ->diff(new DateTime('now'))
                ->y;
        }

        $minAge = $age > 1 ? $age - 1 : $age;
        $maxAge = $age + 1;

        self::create([
            'user_id' => $user->id,
            'radius_meters' => 10000,
            'pref_breeds' => Json::encode([]),
            'age_from' => $minAge,
            'age_to' => $maxAge
        ]);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
