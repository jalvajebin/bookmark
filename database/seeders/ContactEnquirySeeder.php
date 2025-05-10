<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactEnquiry;

class ContactEnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactEnquiry::create([
            'type' => 'seeker',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'country' => 'US',
            'email' => 'john.doe@example.com',
            'subject' => 'Looking for a job',
            'message' => 'I am interested in finding a software developer position.',
        ]);

        ContactEnquiry::create([
            'type' => 'client',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'country' => 'UK',
            'email' => 'jane.smith@example.com',
            'subject' => 'Hiring inquiry',
            'message' => 'I need a developer for a web app project.',
        ]);
    }
}
