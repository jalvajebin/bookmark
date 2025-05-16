<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
           
            [
                'title' => 'Contact Us',
                'description' => 'Reach out for any queries or support needs.',
                'alt' => 'contact',
                'page' => 'contact',
            ],
            [
                'title' => 'Destinations',
                'description' => 'Discover teaching opportunities around the world.',
                'alt' => 'destination',
                'page' => 'destination',
            ],
        ];

        foreach ($banners as $banner) {
            Banner::updateOrCreate(
                ['page' => $banner['page']], // Unique by page
                $banner
            );
        }
    }
}
