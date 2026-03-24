<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('seos')->insert([
            [
                'page' => 'home',
                'meta_title' => 'Home - Welcome to Our Site',
                'meta_keyword' => 'home, welcome, main page',
                'meta_description' => 'Explore our homepage and find everything you need.'
            ],
            [
                'page' => 'about',
                'meta_title' => 'About Us - Know Who We Are',
                'meta_keyword' => 'about, team, company, mission',
                'meta_description' => 'Learn more about our company, our team, and our mission.'
            ],
            [
                'page' => 'contact',
                'meta_title' => 'Contact Us - We’re Here to Help',
                'meta_keyword' => 'contact, support, reach us',
                'meta_description' => 'Need help? Contact our team anytime for assistance.'
            ],
            [
                'page' => 'employer',
                'meta_title' => 'Employers - Hire Talent Easily',
                'meta_keyword' => 'employers, hiring, job posting',
                'meta_description' => 'Post jobs and find top candidates through our platform.'
            ],
            [
                'page' => 'service',
                'meta_title' => 'Our Services - What We Offer',
                'meta_keyword' => 'services, solutions, offerings',
                'meta_description' => 'Discover the range of services we provide to businesses and individuals.'
            ],
            [
                'page' => 'blog',
                'meta_title' => 'Blog - Latest News and Tips',
                'meta_keyword' => 'blog, news, articles, tips',
                'meta_description' => 'Stay updated with our latest blog posts, news, and tips.'
            ],
            [
                'page' => 'destination',
                'meta_title' => 'Destinations - Explore Places',
                'meta_keyword' => 'destinations, places, travel, explore',
                'meta_description' => 'Find and explore exciting destinations with us.'
            ],
            [
                'page' => 'job',
                'meta_title' => 'Jobs - Find Your Next Role',
                'meta_keyword' => 'jobs, careers, employment',
                'meta_description' => 'Search and apply for the latest job opportunities.'
            ],
            [
                'page' => 'career',
                'meta_title' => 'Career - Grow With Us',
                'meta_keyword' => 'career, growth, opportunity',
                'meta_description' => 'Join our team and take your career to the next level.'
            ]
        ]);
    }

     DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'status' => 1,
            'is_admin' => 1
        ]);

  
    }
}
