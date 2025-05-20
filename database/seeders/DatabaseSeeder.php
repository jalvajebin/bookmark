<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use App\Models\JobTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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

        {
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@bookmark.com',
                'password' => Hash::make('admin#2780-K3'),
                'status' => 1,
                'is_admin' => 1
            ]);
        }


        // JobTag::create(['name' => 'Laravel', 'slug' => 'laravel']);
        // JobTag::create(['name' => 'Vue JS', 'slug' => 'vue-js']);
        // JobTag::create(['name' => 'Livewire', 'slug' => 'livewire']);
    }
}
