<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Counter;
use App\Models\LearnAboutUs;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){

        $banner = Banner::where('page', 'about')->first();
        $about = AboutUs::first();
        $learAboutUs = LearnAboutUs::first();
        $counters = Counter::first();

        $testimonials = Testimonial::orderBy('id', 'asc')->get();
    
        return view('website.about', compact('banner', 'about' , 'learAboutUs' , 'counters' , 'testimonials'));
    }
}
