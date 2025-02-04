<?php

namespace App\Http\Contracts;

use App\Models\Applicant;

interface ApplicantRepositoryInterface
{
    public function create(array $data, int $id): Applicant;
}
