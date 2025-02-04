<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'firstname'   => 'Gevorg',
                'lastname'    => 'lastname1',
                'picture'     => '<img src="' . config('app.url') . '/storage/pic1.png">',
                'position'    => 'ceo',
                'description' => 'description1',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'firstname'   => 'Sergey',
                'lastname'    => 'lastname2',
                'picture'     => '<img src="' . config('app.url') . '/storage/pic2.png">',
                'position'    => 'ceo',
                'description' => 'description2',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
