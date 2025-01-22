<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Contracts\ArticleRepositoryInterface;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
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
    public function __construct(protected ArticleRepositoryInterface $articleRepository ) {}

    /**
     * @return AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection {
        $articles = $this->articleRepository->all();
        return ArticleResource::collection($articles);
    }

    /**
     * @param ArticleCreateRequest $request
     * @return ArticleResource
     */
    public function store(ArticleCreateRequest $request) : ArticleResource {
        try {
            $data = $request->validated();

            DB::beginTransaction();

            $article = $this->articleRepository->create([
                'title' => $data['title'],
                'body' => $data['body'],
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
     * @param int $article_id
     * @return ArticleResource
     */
    public function update(ArticleUpdateRequest $request, int $article_id) : ArticleResource {
        $data = $request->validated();
        $article = $this->articleRepository->find($article_id);

        $this->articleRepository->update([
            'title' => $data['title'] ?? $article->title,
            'body' => $data['body'] ?? $article->body,
        ], $article_id);

        return new ArticleResource($this->articleRepository->find($article_id));
    }

    /**
     * @param $article_id
     * @return JsonResponse
     */
    public function destroy(int $article_id) : JsonResponse {
        $article = $this->articleRepository->delete($article_id);
        return response()->json(['message' => 'Article deleted successfully!']);
    }
}
