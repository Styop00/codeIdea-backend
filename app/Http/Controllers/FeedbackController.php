<?php

namespace App\Http\Controllers;

use App\Http\Contracts\FeedbackRepositoryInterface;
use App\Http\Requests\FeedbackCreateRequest;
use App\Http\Requests\FeedbackUpdateRequest;
use App\Http\Resources\FeedbackResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * @param FeedbackRepositoryInterface $feedbackRepository
     */
    public function __construct(protected FeedbackRepositoryInterface $feedbackRepository)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $feedbacks = $this->feedbackRepository->all(['user']);
        return FeedbackResource::collection($feedbacks);
    }

    /**
     * @param FeedbackCreateRequest $request
     * @return FeedbackResource
     */
    public function store(FeedbackCreateRequest $request): FeedbackResource
    {
        $data = $request->validated();

        DB::beginTransaction();

        $feedback = $this->feedbackRepository->create([
            'feedback' => $data['feedback'],
            'user_id'  => $data['user_id'],
        ]);

        DB::commit();

        return new FeedbackResource($feedback);
    }

    /**
     * @param FeedbackUpdateRequest $request
     * @param int $id
     * @return FeedbackResource
     */
    public function update(FeedbackUpdateRequest $request, int $id): FeedbackResource
    {
        $data = $request->validated();

        $feedback = $this->feedbackRepository->find($id);

        $this->feedbackRepository->update([
            'user_id'  => $data['user_id'] ?? $feedback->user_id,
            'feedback' => $data['feedback'] ?? $feedback->feedback,
        ], $id);

        return new FeedbackResource($this->feedbackRepository->find($id));
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->feedbackRepository->delete($id);
        return response()->json(['message' => "Feedback deleted"], 200);
    }
}
