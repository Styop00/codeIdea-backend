<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("job_positions")->insert([
            [
                "title"       => "IT Project Manager",
                "about"       => "We transform the way IT products are developed, creating a collaborative culture where br teams and founders shape the success of digital products together.",
                "description" => "We are looking for an individual who has extensive project management experience (minimum of 3 years) and wants to take responsibility for project success. Additionally, they have knowledge of a project management framework such as PMI/Prince2. They are able to work effectively in multiple threads simultaneously, in a VUCA environment. They are not afraid of feedback and disagreement, and they are able to work with different personality types. It is someone who can balance organizing and planning project work with giving initiative and control to the team. It is also someone who is entrepreneurial, i.e., proactively and creatively solves problems, keeping in mind the welfare of the client and own team."
            ],
            [
                "title"       => "Senior IT Business Analyst",
                "about"       => "We transform the way IT products are developed, creating a collaborative culture where br teams and founders shape the success of digital products together.",
                "description" => "We are looking for an individual who has extensive project management experience (minimum of 3 years) and wants to take responsibility for project success. Additionally, they have knowledge of a project management framework such as PMI/Prince2. They are able to work effectively in multiple threads simultaneously, in a VUCA environment. They are not afraid of feedback and disagreement, and they are able to work with different personality types. It is someone who can balance organizing and planning project work with giving initiative and control to the team. It is also someone who is entrepreneurial, i.e., proactively and creatively solves problems, keeping in mind the welfare of the client and own team."
            ],
            [
                "title"       => "Senior Software Engineer in Test",
                "about"       => "We transform the way IT products are developed, creating a collaborative culture where br teams and founders shape the success of digital products together.",
                "description" => "We are looking for an individual who has extensive project management experience (minimum of 3 years) and wants to take responsibility for project success. Additionally, they have knowledge of a project management framework such as PMI/Prince2. They are able to work effectively in multiple threads simultaneously, in a VUCA environment. They are not afraid of feedback and disagreement, and they are able to work with different personality types. It is someone who can balance organizing and planning project work with giving initiative and control to the team. It is also someone who is entrepreneurial, i.e., proactively and creatively solves problems, keeping in mind the welfare of the client and own team."
            ],
            [
                "title"       => "JavaScript Fullstack Developer",
                "about"       => "We transform the way IT products are developed, creating a collaborative culture where br teams and founders shape the success of digital products together.",
                "description" => "We are looking for an individual who has extensive project management experience (minimum of 3 years) and wants to take responsibility for project success. Additionally, they have knowledge of a project management framework such as PMI/Prince2. They are able to work effectively in multiple threads simultaneously, in a VUCA environment. They are not afraid of feedback and disagreement, and they are able to work with different personality types. It is someone who can balance organizing and planning project work with giving initiative and control to the team. It is also someone who is entrepreneurial, i.e., proactively and creatively solves problems, keeping in mind the welfare of the client and own team."
            ],
        ]);
    }
}
