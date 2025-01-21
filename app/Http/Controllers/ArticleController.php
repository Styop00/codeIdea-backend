<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Contracts\ArticleRepositoryInterface;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(protected ArticleRepositoryInterface $articleRepository ) {}

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse {
        $articles = $this->articleRepository->all();
        return response()->json($articles);
    }

    /**
     * @param ArticleCreateRequest $request
     * @return JsonResponse
     */
    public function create(ArticleCreateRequest $request) : JsonResponse {
        try {
            $request->validated();

            DB::beginTransaction();

            $article = $this->articleRepository->create([
                'title' => $request->title,
                'body' => $request->body,
            ]);

            DB::commit();

            return response()->json($article);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Error! Unable to create article.']);
        }
    }

    /**
     * @param ArticleUpdateRequest $request
     * @param int $article_id
     * @return JsonResponse
     */
    public function update(ArticleUpdateRequest $request, int $article_id) : JsonResponse {
        $request->validated();
        $article = $this->articleRepository->find($article_id);

        $this->articleRepository->update([
            'title' => $request->input('title') ?? $article->title,
            'body' => $request->input('body') ?? $article->body,
        ], $article_id);

        return response()->json(['message' => 'Article updated successfully!']);
    }

    /**
     * @param $article_id
     * @return JsonResponse
     */
    public function delete(int $article_id) : JsonResponse {
        $this->articleRepository->delete($article_id);
        return response()->json(['message' => 'Article deleted successfully!']);
    }
}
