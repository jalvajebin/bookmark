<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Counter;
use App\Models\Destination;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobPositionType;
use App\Models\JobSchoolType;
use App\Models\JobSpecialism;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function index(Request $request)
    {
        $locationName = $request->input('location');   // eg: 'l2' (name)
        $categoryName = $request->input('category');   // eg: 'IT' (name)
        $search       = $request->input('search');

        $query = Job::query();

        if ($locationName) {
            $location = JobLocation::where('title', $locationName)->first();
            if ($location) {
                $query->where('location', $location->id);
            }
        }

        if ($categoryName) {
            $category = JobCategory::where('title', $categoryName)->first();
            if ($category) {
                $query->where('category', $category->id);
            }
        }

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $latestJobs = $query->latest()->get();

        $destinations = Destination::all();
        $about = AboutUs::first();
        $blog = Blog::all();
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
        $counters = Counter::first();
        $locations = JobLocation::orderBy('title')->get();
        $categories = JobCategory::orderBy('title')->get();

        return view('website.home', compact(
            'latestJobs', 'about', 'destinations', 'blog', 'testimonials',
            'counters', 'locations', 'categories', 'locationName', 'categoryName', 'search'
        ));
    }


}
