<?php

namespace App\Http\Contracts;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Collection;

interface ApplicantRepositoryInterface {


    public function create(array $data,int $id) : Applicant;


}
