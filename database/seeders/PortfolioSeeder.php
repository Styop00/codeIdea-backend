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
            [
                "title"   => "Waddington's",
                "about"   => 'Cross-platform mobile app for Canadian auction and appraisal company',
                'color'   => "#A062CB",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Veseli Carameli",
                "about"   => 'Corporate website development for Veseli karameli, caramel sweets crafting company',
                'color'   => "#FF8BB2",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Template Monster",
                "about"   => 'Custom content editor development for Template Monster\'s blog',
                'color'   => "#3BA8FF",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "W86",
                "about"   => 'Website development for real estate development company project in Krems, Austria',
                'color'   => "#C9C0FF",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Gamers Point",
                "about"   => 'Development of web platfrom running online contests for gamers',
                'color'   => "#C3D187",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Jiwatt",
                "about"   => 'Mobile app and landing page UI design for online fitness solution',
                'color'   => "#F3F3F3",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Cluber",
                "about"   => 'Cross-platform mobile app development for online radio',
                'color'   => "#E86763",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "WaysGo",
                "about"   => 'Native iOS & Android app development for users to share restaurant visiting exp rience',
                'color'   => "#96EAEB",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "PawPads",
                "about"   => "Android messaging app development for anthropomorph community",
                'color'   => "#FFA25B",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "SpyProof",
                "about"   => 'Mobile app that helps Android OS users identify possible security issues',
                'color'   => "#F7F7F7",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Friendly Friday",
                "about"   => "Peanut butter production company's brand & packaging design concept",
                'color'   => "#F8F8F8",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Ok lock",
                "about"   => "Branding and web platform development for lost & found service company",
                'color'   => "#FEDF60",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Hip-Hop",
                "about"   => 'Landing page UI design and development for furniture development company\'s product',
                'color'   => "#A7EB71",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Oppo",
                "about"   => "UI design for custom made furniture e-commerce platform",
                'color'   => "#F3F3F3",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Villaggio",
                "about"   => "Website development for architectural bureau",
                'color'   => "#FF5A45",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Teahouse",
                "about"   => "E-commerce platform development for the biggest tea importing company in Ukraine",
                'color'   => "#D5CFC6",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Outspeak",
                "about"   => "UI/UX design for the digital platform that hosts user-created media channels",
                'color'   => "#76D1F2",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Promarmatura",
                "about"   => "Corporate website development for company engaged in the production of equipment for industrial enterprises",
                'color'   => "#B8D8F4",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "MaQoo",
                "about"   => "UI design and development of e-commerce platform selling unique underware",
                'color'   => "#E7C9B4",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Hi5",
                "about"   => "Corporate website for music recording studio",
                'color'   => "#FFB039",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Eclipse",
                "about"   => "Design of the printed catalog of the glass facades developer",
                'color'   => "#C0C2CC",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Aegle",
                "about"   => "Cross-platform mobile app development for fitness company",
                'color'   => "#F0F1F2",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Vernum",
                "about"   => "Bank's corporate website design and development",
                'color'   => "#7D98A6",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "FlyMyCard",
                "about"   => "Development of a cross-platform app for the social media service that allows users
                                sending beautiful virtual postcards to friends and other users",
                'color'   => "#EB6146",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Oko",
                "about"   => "Android application for people got in extreme situation to be able to record video
                                and save it on the go together with location, so their friends know what happens",
                'color'   => "#519EF3",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
            [
                "title"   => "Parachute",
                "about"   => "Landing page design and development for insurance company",
                'color'   => "#F0F1F2",
                'img_url' => asset('storage/portfolioImg.webp'),
            ],
        ]);
    }
}
