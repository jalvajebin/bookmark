<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Destination;
use App\Models\Job;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function index(){
        $destinations = Destination::all();

        $latestJobs = Job::latest()->get(); 
        $about = AboutUs::first();

        $blog = Blog::all();
    
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
      
        return view('website.home', compact('latestJobs', 'about', 'destinations', 'blog', 'testimonials'));
    }
}
