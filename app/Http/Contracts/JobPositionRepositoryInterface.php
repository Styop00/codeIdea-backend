<?php

namespace App\Http\Contracts;

use App\Models\JobPosition;
use Illuminate\Database\Eloquent\Collection;

interface JobPositionRepositoryInterface {
    public function all() : Collection;

    public function find(int $id) : JobPosition | null;


}
