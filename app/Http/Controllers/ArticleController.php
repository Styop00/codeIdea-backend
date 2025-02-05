<?php

namespace App\Http\Controllers;

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
        $data = $request->validated();
        $articles = $this->articleRepository->all($data['page'], $data);
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
     * @return ArticleResource | JsonResponse
     */
    public function store(ArticleCreateRequest $request): ArticleResource | JsonResponse
    {
        try {
            $data = $request->validated();

            DB::beginTransaction();

            $article = $this->articleRepository->create([
                'title'       => $data['title'],
                'description' => $data['description'],
                'body'        => $data['body'],
            ]);

            $article->categories()->attach([
                'category_id' => $request->category_id,
            ]);

            DB::commit();

            return new ArticleResource($article);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
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
            'title'       => $data['title'] ?? $article->title,
            'description' => $data['description'] ?? $article->description,
            'body'        => $data['body'] ?? $article->body,
        ], $articleId);

        return new ArticleResource($this->articleRepository->find($articleId));
    }

    /**
     * @param int $articleId
     * @return JsonResponse
     */
    public function destroy(int $articleId): JsonResponse
    {
        $article = $this->articleRepository->delete($articleId);
        return response()->json(['message' => 'Article deleted successfully!']);
    }
}
