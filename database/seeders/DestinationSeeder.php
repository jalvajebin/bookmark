<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('destinations')->insert([
            [
                'name' => 'Project One',
                'description' => 'This is a short description of Project One.',
                'description_2' => 'Additional details about Project One.',
                'main_image_alt' => 'Main image showing the overview of Project One',
                'inner_image_1_alt' => 'Inner image showing feature 1 of Project One',
                'inner_image_2_alt' => 'Inner image showing feature 2 of Project One',
                'slug' => Str::slug('Project One') . '-' . Str::random(5),
            ],
            [
                'name' => 'Project Two',
                'description' => 'Brief summary of Project Two.',
                'description_2' => 'More insights on Project Two.',
                'main_image_alt' => 'Main image for Project Two',
                'inner_image_1_alt' => 'Feature highlight image 1 of Project Two',
                'inner_image_2_alt' => 'Feature highlight image 2 of Project Two',
                'slug' => Str::slug('Project Two') . '-' . Str::random(5),
            ]
        ]);
    }
}
