<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use Nette\Utils\Json;

/**
 * @property int $user_id
 * @property int $radius_meters
 * @property mixed $pref_breeds
 * @property int $age_from
 * @property int $age_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class UserSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array|Arrayable|\JsonSerializable
     * @throws \Nette\Utils\JsonException
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        /** UserSetting $this */
        return [
            'user_id' => $this->user_id,
            'radius_meters' => $this->radius_meters ?? 0,
            'pref_breeds' => Json::decode($this->pref_breeds) ?? [],
            'age_from' => $this->age_from ?? 1,
            'age_to' => $this->age_to ?? 1
        ];
    }
}
