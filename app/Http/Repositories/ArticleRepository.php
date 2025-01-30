<?php

namespace App\Http\Repositories;

use App\Http\Contracts\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * @return Article | null
     */
    public function get_random_articles(int $id) {
        return $this->article->where('id', '!=', $id)->inRandomOrder()->limit(3)->get();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function all(int $page) : LengthAwarePaginator  {
        return $this->article->paginate(10);
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

