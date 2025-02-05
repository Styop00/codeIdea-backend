<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                "category_name" => "Business",
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                "category_name" => "E-commerce",
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                "category_name" => "Guides",
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                "category_name" => "Inside look",
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                "category_name" => "Lifehacks",
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                "category_name" => "News",
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                "category_name" => "SaaS",
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                "category_name" => "Technology",
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        );

    }
}
