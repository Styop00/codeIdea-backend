<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpportunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("opportunities")->insert([
            ["opportunity_name"=>"Support one or more teams simultaneously to successfully deliver customer solutions,","job_position_id"=>1],
            ["opportunity_name"=>"Have influence and responsibility for achieving the established project goals and objectives of the organization, ","job_position_id"=>1],
            ["opportunity_name"=>"Monitor team performance, quality delivered to customers, and project budget, scope and schedule,","job_position_id"=>1],
            ["opportunity_name"=>"Manage both stakeholders and communications to them, as well as project risks,","job_position_id"=>1],
            ["opportunity_name"=>"Define and improve delivery processes using knowledge, data (project metrics) and creativity,","job_position_id"=>1],
        ]);
    }
}
