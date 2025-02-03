<?php

namespace App\Http\Controllers;

use App\Http\Contracts\PortfolioRepositoryInterface;
use App\Http\Requests\PortfolioCreateRequest;
use App\Http\Requests\PortfolioUpdateRequest;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use App\Services\FileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PortfolioController extends Controller
{


    /**
     * @param PortfolioRepositoryInterface $portfolioRepository
     * @param FileService $fileService
     */
    public function __construct(protected PortfolioRepositoryInterface $portfolioRepository, protected FileService $fileService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $portfolio = $this->portfolioRepository->all();
        return PortfolioResource::collection($portfolio);
    }


    /**
     * @param PortfolioCreateRequest $request
     * @return PortfolioResource
     */
    public function store(PortfolioCreateRequest $request): PortfolioResource
    {

        $imagePath = null;
        $img = $request->file('img');
        if ($img) {
            $imagePath = $this->fileService->storeFile($img);
        }
        $portfolioData = $request->validated();
        $portfolioData['img_url'] = $imagePath;
        $portfolio = $this->portfolioRepository->create($portfolioData);
        return new PortfolioResource($portfolio);
    }

    /**
     * @param PortfolioUpdateRequest $request
     * @param int $portfolio_id
     * @return PortfolioResource
     */
    public function update(PortfolioUpdateRequest $request, int $portfolio_id): PortfolioResource
    {

        $imagePath = null;
        $img = $request->file('img');
        if ($img) {
            $imagePath = $this->fileService->storeFile($img);
        }
        $portfolioData = $request->validated();
        $portfolioData["img_url"] = $imagePath;
        $this->portfolioRepository->update($portfolioData, $portfolio_id);
        return new PortfolioResource(Portfolio::query()->where('id', $portfolio_id)->first());
    }

    /**
     * @param Portfolio $portfolio
     * @return PortfolioResource
     */
    public function show(Portfolio $portfolio): PortfolioResource
    {
        return new PortfolioResource($portfolio);
    }

    /**
     * @param int $portfolio_id
     * @return JsonResponse
     */
    public function destroy(int $portfolio_id): JsonResponse
    {
        $this->portfolioRepository->delete($portfolio_id);
        return response()->json(['message' => 'Portfolio deleted successfully!']);

    }
}







