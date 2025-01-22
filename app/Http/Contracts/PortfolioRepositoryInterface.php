<?php

namespace App\Http\Contracts;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Collection;

interface PortfolioRepositoryInterface {
    public function all() : Collection;

    public function find(int $id) : Portfolio | null;

    public function create(array $data) : ?Portfolio;

    public function update(array $data, int $id) : bool;

    public function delete(int $id) : bool;
}
