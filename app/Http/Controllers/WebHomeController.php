<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Destination;
use App\Models\Job;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function index(){

        $latestJobs = Job::latest()->get(); 
        $about = AboutUs::first();
        return view('website.home', compact('latestJobs', 'about'));
    }
}
