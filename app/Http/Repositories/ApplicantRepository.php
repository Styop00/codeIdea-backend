<?php

namespace App\Http\Repositories;

use App\Http\Contracts\ApplicantRepositoryInterface;
use App\Models\Applicant;
use Carbon\Carbon;

class ApplicantRepository implements ApplicantRepositoryInterface
{

    /**
     * @param array $data
     * @param int $id
     * @return Applicant
     */
    public function create(array $data, int $id): Applicant
    {
        return Applicant::query()->create([
            "job_position_id"  => $id,
            "full_name"        => $data["fullname"],
            "phone_number"     => $data["phone_number"],
            "email"            => $data["email"],
            "applied_position" => $data["applied_position"],
            "applied_date"     => Carbon::createFromDate($data["applied_date"]),
            "about_applicant"  => $data["about_applicant"],
            "cv_url"           => $data['cv_applicant']
        ]);

    }
}
