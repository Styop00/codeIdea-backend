<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Contracts\ArticleRepositoryInterface;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Requests\PaginationRequest;
use App\Models\Article;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\ArticleResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticleController extends Controller
{
    /**
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(protected ArticleRepositoryInterface $articleRepository)
    {
    }

    /**
     * @param PaginationRequest $request
     * @return JsonResponse
     */
    public function index(PaginationRequest $request): JsonResponse
    {
        $page = $request->validated();
        $articles = $this->articleRepository->all($page['page']);
        return response()->json($articles);
    }

    /**
     * @param int $articleId
     * @return JsonResponse
     */
    public function show(int $articleId): JsonResponse
    {
        $article = $this->articleRepository->find($articleId);

        return response()->json($article);
    }

    /**
     * @param int $currentArticleId
     * @return JsonResponse
     */
    public function getRandomArticles(int $currentArticleId): JsonResponse
    {
        $articles = $this->articleRepository->getRandomArticles($currentArticleId);
        return response()->json($articles);
    }

    /**
     * @param ArticleCreateRequest $request
     * @return ArticleResource
     */
    public function store(ArticleCreateRequest $request): ArticleResource
    {
        try {
            $data = $request->validated();

            DB::beginTransaction();

            $article = $this->articleRepository->create([
                'title' => $data['title'],
                'body'  => $data['body'],
            ]);

            DB::commit();

            return new ArticleResource($article);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Error! Unable to create article.']);
        }
    }

    /**
     * @param ArticleUpdateRequest $request
     * @param int $articleId
     * @return ArticleResource
     */
    public function update(ArticleUpdateRequest $request, int $articleId): ArticleResource
    {
        $data = $request->validated();
        $article = $this->articleRepository->find($articleId);

        $this->articleRepository->update([
            'title' => $data['title'] ?? $article->title,
            'body'  => $data['body'] ?? $article->body,
        ], $articleId);

        return new ArticleResource($this->articleRepository->find($articleId));
    }

    /**
     * @param $articleId
     * @return JsonResponse
     */
    public function destroy(int $articleId): JsonResponse
    {
        $article = $this->articleRepository->delete($articleId);
        return response()->json(['message' => 'Article deleted successfully!']);
    }
}
