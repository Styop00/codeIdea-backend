<?php

namespace App\Http\Repositories;

use App\Models\JobPosition;
use Illuminate\Database\Eloquent\Collection;

class JobPositionRepository implements \App\Http\Contracts\JobPositionRepositoryInterface
{

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return JobPosition::all();
    }

    /**
     * @param int $id
     * @return JobPosition|null
     */
    public function find(int $id): JobPosition|null
    {
        return JobPosition::query()->where('id', $id)->with(["opportunities", "skills"])->first();
    }
}
