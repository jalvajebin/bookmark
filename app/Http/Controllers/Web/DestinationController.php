<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Destination;
use App\Models\Job;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(){
        $banner = Banner::where('page', 'destination')->first();
        $destinations = Destination::orderBy('id', 'asc')->take(6)->get();
        return view('website.destination', compact('banner', 'destinations'));
    }

    public function show(Request $request, $slug){
        $banner = Banner::where('page', 'destination')->first();
        $destination = Destination::where('slug', $slug)->first();
        $jobs = Job::where('destination_id', $destination->id)
        ->latest() 
        ->get();
        return view ('website.destination-detail', compact('destination', 'banner', 'jobs'));
    }
}
