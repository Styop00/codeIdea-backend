<?php

namespace App\Http\Repositories;

use App\Http\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @param Category $category
     */
    public function __construct(protected Category $category)
    {
    }

    /**
     * @param int $id
     * @return Category | null
     */
    public function find(int $id): Category|null
    {
        return $this->category->where('id', $id)->first();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Category::with('articles')->get();
    }

    /**
     * @param array $data
     * @return Category
     */
    public function create(array $data): Category
    {
        return $this->category->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, int $id): bool
    {
        return $this->category->where('id', $id)->update($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->category->destroy($id);
    }
}

