<?php

namespace App\Http\Contracts;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface {
    public function all(int $page) : LengthAwarePaginator;

    public function find(int $id) : Article | null;

    public function create(array $data) : Article;

    public function update(array $data, int $id) : bool;
    
    public function delete(int $id) : bool; 
 }