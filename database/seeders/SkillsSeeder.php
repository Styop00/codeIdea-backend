<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("skills")->insert([
            ["skill_name" => "IT Project Manager in international projects", "job_position_id" => 1],
            ["skill_name" => "Methodology for project management - PMI/Prince2 and agile frameworks", "job_position_id" => 1],
            ["skill_name" => "Project metrics", "job_position_id" => 1],
            ["skill_name" => "Responsibility for processes and tasks", "job_position_id" => 1],
            ["skill_name" => "Negotiation and change management", "job_position_id" => 1],
            ["skill_name" => "English C1", "job_position_id" => 1],
            ["skill_name" => "Quick recruitment process", "job_position_id" => 1],
        ]);
    }
}
