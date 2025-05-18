<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use App\Models\JobTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Admin User',
//            'email' => 'admin@example.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('password'),
//            'is_admin' => 1,
//        ]);
//
//
//          User::factory(3)->create([
//            'is_admin' => 0,
//            'password' => Hash::make('password'),
//        ]);

        $faker = Faker::create();

        // Example arrays for foreign keys - make sure these IDs exist in your DB
        $locationIds = [1, 2, 3];       // Replace with your actual location IDs
        $categoryIds = [1, 2, 3];
        $schoolTypeIds = [1, 2];
        $specialismIds = [1, 2, 3];
        $positionTypeIds = [1, 2];

        for ($i = 0; $i < 10; $i++) {
            Job::create([
                'title'          => $faker->jobTitle,
                'company_name'   => $faker->company,
                'location'       => $faker->randomElement($locationIds),
                'category'       => $faker->randomElement($categoryIds),
                'salary_rang'    => $faker->randomElement(['2000-3000', '3000-4000', '4000-5000']),
                'date'           => $faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
                'job_type'       => $faker->randomElement(['FULL_TIME', 'PART_TIME']),
                'description'    => '<p>' . $faker->paragraph(3) . '</p>',
                'school_type'    => $faker->randomElement($schoolTypeIds),
                'specialism'     => $faker->randomElement($specialismIds),
                'position_type'  => $faker->randomElement($positionTypeIds),
            ]);
        }


        // JobTag::create(['name' => 'Laravel', 'slug' => 'laravel']);
        // JobTag::create(['name' => 'Vue JS', 'slug' => 'vue-js']);
        // JobTag::create(['name' => 'Livewire', 'slug' => 'livewire']);
    }
}
