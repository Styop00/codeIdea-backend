<?php

namespace App\Http\Contracts;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface {
    public function all() : Collection;

    public function find(int $id) : Category | null;

    public function create(array $data) : Category;

    public function update(array $data, int $id) : bool;

    public function delete(int $id) : bool;
}