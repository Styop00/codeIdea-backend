<?php

namespace App\Http\Repositories;

use App\Http\Contracts\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface {
    /**
     * @param Article $article
     */    
    public function __construct(protected Article $article) {}

    /**
     * @param int $id
     * @return Article | null
     */
    public function find(int $id) : Article | null {
        return $this->article->where('id', $id)->first();
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function getRandomArticles(int $id) : Collection  {
        return $this->article->where('id', '!=', $id)->inRandomOrder()->limit(3)->get();
    }

    /**
     * @param int $page 
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function all(int $page, array $data) : LengthAwarePaginator  {
        if (isset($data['category_id'])) {
            $category_id = $data['category_id'];

            return $this->article->withWhereHas('categories', function($query) use($category_id) {
                $query->where('category_id', '=', $category_id);
            })->paginate(10);
        } 
        elseif (isset($data['other'])) {
            return $this->article->whereDoesntHave('categories')->paginate(10);
        } 
        else {
            return $this->article->paginate(10);
        }
    }

    /**
     * @param array $data
     * @return Article
     */
    public function create(array $data) : Article {
        return $this->article->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, int $id) : bool {
        return $this->article->where('id', $id)->update($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool {
        return $this->article->destroy($id);
    }
}

