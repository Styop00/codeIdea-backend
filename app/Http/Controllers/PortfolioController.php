<?php

namespace App\Http\Controllers;

use App\Http\Contracts\PortfolioRepositoryInterface;
use App\Http\Requests\PortfolioCreateRequest;
use App\Http\Requests\PortfolioUpdateRequest;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use App\Services\ImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PortfolioController extends Controller
{

    protected $imageService;
    /**
     * @param PortfolioRepositoryInterface $portfolioRepository
     */
    public function __construct(protected PortfolioRepositoryInterface $portfolioRepository,ImageService $imageService){
        $this->imageService = $imageService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index():AnonymousResourceCollection{
        $portfolio=$this->portfolioRepository->all();
        return PortfolioResource::collection($portfolio);
   }


    /**
     * @param PortfolioCreateRequest $request
     * @return Portfolio
     */
    public function store(PortfolioCreateRequest $request ): PortfolioResource
    {

        $imagePath=null;
        $img = $request->file('img');
        if($img){
            $imagePath=$this->imageService->storeImage($img);
        }
        $portfolioData=$request->validated();
        $portfolioData['img_url']=$imagePath;
        $portfolio=$this->portfolioRepository->create($portfolioData);
        return new PortfolioResource($portfolio);
   }

    /**
     * @param int $id
     * @param PortfolioUpdateRequest $request
     * @return bool
     */
    public function update( PortfolioUpdateRequest $request,int $portfolio_id):PortfolioResource{

        $imagePath=null;
        $img=$request->file('img');
        if($img){
            $imagePath=$this->imageService->storeImage($img);
        }
        $portfolioData=$request->validated();
        $portfolioData["img_url"]=$imagePath;
        $this->portfolioRepository->update($portfolioData,$portfolio_id);
         return new PortfolioResource(Portfolio::query()->where('id',$portfolio_id)->first());
   }

    /**
     * @param int $portfolio_id
     * @return Portfolio
     */
    public function show(int $portfolio_id): PortfolioResource
   {
       $portfolio=$this->portfolioRepository->find($portfolio_id);
        return new PortfolioResource($portfolio);
   }

    /**
     * @param int $portfolio_id
     * @return bool
     */
    public function destroy(int $portfolio_id):JsonResponse{
         $this->portfolioRepository->delete($portfolio_id);
         return response()->json(['message' => 'Portfolio deleted successfully!']);

    }
}







