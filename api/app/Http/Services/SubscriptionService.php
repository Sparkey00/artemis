<?php

namespace App\Http\Services;

use App\Http\Interfaces\SearchServiceInterface;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Collection;

class SubscriptionService implements SearchServiceInterface
{
    /**
     * @param array $params
     * @return Collection|array
     */
    public function search(array $params = []): Collection|array
    {
        $query = Subscription::query();

        foreach ($params as $name => $param) {
            $query->where($name, '=', $param);
        }

        return $query->get();
    }
}
