<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('portfolios')->insert([
            "title"=>"Veseli Carameli",
            "about"=>'Corporate website development for Veseli karameli, caramel sweets crafting company',
            'color'=>"#FF8BB2",
            'img_url'=>asset('photos/portfolioImg.webp')

        ]);
    }
}
