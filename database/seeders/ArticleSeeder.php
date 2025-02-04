<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title'       => 'Breaking the Mold: How AI is Redefining Excellence',
                'description' => 'Learn how AI sets a new standard for agency excellence by automating tasks, enhancing creativity, and driving...',
                'body'        => '<p class="mb-5">Learn how AI sets a new standard for agency excellence by automating tasks, enhancing creativity, and driving. </p> <img src="' . config('app.url') . '/storage/aa.png">',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
