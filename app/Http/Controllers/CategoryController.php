<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Contracts\CategoryRepositoryInterface;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CategoryController extends Controller
{
    /**
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(protected CategoryRepositoryInterface $categoryRepository)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = $this->categoryRepository->all();
        return response()->json($categories);
    }

    /**
     * @param CategoryCreateRequest $request
     * @return CategoryResource
     */
    public function store(CategoryCreateRequest $request): CategoryResource
    {
        $data = $request->validated();

        DB::beginTransaction();

        $category = $this->categoryRepository->create([
            'category_name' => $data['category_name'],
        ]);

        DB::commit();

        return new CategoryResource($category);
    }

    /**
     * @param CategoryUpdateRequest $request
     * @param int $category_id
     * @return CategoryResource
     */
    public function update(CategoryUpdateRequest $request, int $category_id): CategoryResource
    {
        $data = $request->validated();
        $category = $this->categoryRepository->find($category_id);

        $this->categoryRepository->update([
            'category_name' => $data['category_name'] ?? $category->category_name,
        ], $category_id);

        return new CategoryResource($this->categoryRepository->find($category_id));
    }

    /**
     * @param int $category_id
     * @return JsonResponse
     */
    public function destroy(int $category_id): JsonResponse
    {
        $this->categoryRepository->delete($category_id);
        return response()->json(['message' => 'Category deleted successfully!']);
    }
}
