<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'title' => 'akhilesh',
            'title_two' => 'vadakkekkara',
            'discription' => 'service page',
            'discription_two' => 'service page dscrtion two',
            'read_more' => 'readmore',
            'read_more_two' => 'readmoretwo',
            'link' => 'www.home.com',
            'link_two' => 'www.amazon.com',
        ]);

     
    }
}
