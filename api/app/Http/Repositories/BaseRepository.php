<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository implements Interfaces\BaseRepositoryInterface
{
    protected string $modelClass;
    /**
     * @param array $params
     * @return Collection|array
     */
    public function search(array $params = []): Collection|array
    {
        /** @var \Illuminate\Database\Eloquent\Builder $query */
        $query = $this->modelClass::query();

        foreach ($params as $name => $param) {
            $query->where($name, '=', $param);
        }

        return $query->get();
    }
}
