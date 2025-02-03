<?php

namespace App\Http\Controllers;

use App\Http\Contracts\ApplicantRepositoryInterface;
use App\Http\Contracts\JobPositionRepositoryInterface;
use App\Http\Requests\ApplicantRequest;
use App\Http\Resources\JobPositionResource;
use App\Models\JobPosition;
use App\Services\FileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class JobController extends Controller
{

    /**
     * @param JobPositionRepositoryInterface $jobPositionRepository
     * @param ApplicantRepositoryInterface $applicantRepository
     * @param FileService $fileService
     */
    public function __construct(protected JobPositionRepositoryInterface $jobPositionRepository, protected ApplicantRepositoryInterface $applicantRepository, protected FileService $fileService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $jobPosition = $this->jobPositionRepository->all();
        return JobPositionResource::collection($jobPosition);
    }

    /**
     * @param int $id
     * @return JobPositionResource
     */
    public function show(int $id): JobPositionResource
    {
        $jobPosition = $this->jobPositionRepository->find($id);
        return new JobPositionResource($jobPosition);
    }

    /**
     * @param ApplicantRequest $req
     * @param $id
     * @return JsonResponse
     */
    public function apply(ApplicantRequest $req, $id): JsonResponse
    {
        $cv = $req->file("cv_applicant");
        $files = $req->file("additional_files");
        $cv_path = $this->fileService->storeFile($cv);
        $filesPath = [];
        if ($files) {
            foreach ($files as $file) {
                $filePath = $this->fileService->storeFile($file);
                $filesPath[] = ["file_url" => $filePath];
            }
        }
        $data = $req->validated();
        $data["cv_applicant"] = $cv_path;
        $applicant = $this->applicantRepository->create($data, $id);
        $applicant->files()->createMany($filesPath);
        return response()->json([
            "message" => "ok"
        ]);
    }
}
