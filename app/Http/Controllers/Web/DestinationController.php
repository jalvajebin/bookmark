<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(){
        $banner = Banner::where('page', 'destination')->first();
        return view('website.destination', compact('banner'));
    }

    public function show(Request $request, $sulg){
        $destination = Destination::where('slug', $slug)->first();
    }
}
