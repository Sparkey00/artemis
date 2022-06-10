<?php

namespace App\Http\Repositories;

use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->modelClass = User::class;
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
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|User
     */
    public function findByPK($id): \Illuminate\Database\Eloquent\Model|User
    {
        return User::firstOrFail($id);
    }
}
