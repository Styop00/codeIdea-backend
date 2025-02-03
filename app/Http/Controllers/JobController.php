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
    protected $fileService;

    public function __construct(protected JobPositionRepositoryInterface $jobPositionRepository,protected ApplicantRepositoryInterface $applicantRepository,FileService $fileService){
        $this->fileService = $fileService;

    }
    public function index():AnonymousResourceCollection{
        $jobPosition =$this->jobPositionRepository->all();
        return JobPositionResource::collection($jobPosition);
    }
    public function show(int $id):JobPositionResource{
        $jobPosition= $this->jobPositionRepository->find($id);
        return new JobPositionResource($jobPosition);
    }
    public function apply(ApplicantRequest $req, $id):JsonResponse{
        $cv=$req->file("cv_applicant");
        $files=$req->file("additional_file");
        $cv_path=$this->fileService->storeFile($cv);
        $filesPath=[];
        if ($files){
            foreach ($files as $file){
                $filePath=$this->fileService->storeFile($file);
                $filesPath[]=$filePath;
            }
        }
        $data=$req->validated();
        $data["cv_applicant"]=$cv_path;
        $applicant=$this->applicantRepository->create($data,$id);
        $filesApplicants=[];
        if(isset($data["additional_file"]) && count($data['additional_file']) > 0){
            foreach ($data['additional_file'] as $file) {
                $filesApplicants[] = [
                    'file_url' => $file,
                ];
            }
            $applicant->files()->createMany($filesApplicants);
        }

        return response()->json([
            "message"=>"ok"
        ]);
    }
}
