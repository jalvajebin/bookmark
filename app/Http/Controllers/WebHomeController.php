<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Destination;
use App\Models\Job;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function index(){
<<<<<<< HEAD
        $destinations = Destination::all();
        return view('website.home', compact('destinations'));
=======

        $latestJobs = Job::latest()->get(); 
        $about = AboutUs::first();
        return view('website.home', compact('latestJobs', 'about'));
>>>>>>> 2c31373ca1d52fdbcd2f72ab2872790c42bce2e8
    }
}
