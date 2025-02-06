<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('feedback')->insert([
            [
                "user_id" => 1,
                "feedback" => 'feedback 1',
            ],
            [
                "user_id" => 2,
                "feedback" => 'feedback 2',
            ],
            [
                "user_id" => 1,
                "feedback" => 'feedback 3',
            ],
            [
                "user_id" => 2,
                "feedback" => 'feedback 4',
            ],

            [
                "user_id" => 2,
                "feedback" => 'feedback 5',
            ],

            [
                "user_id" => 2,
                "feedback" => 'feedback 6',
            ],
        ]);
    }
}
