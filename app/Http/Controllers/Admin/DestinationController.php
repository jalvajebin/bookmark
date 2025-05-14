<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    
    public function index()
    {
        $logedUserData = auth()->user(); 
        $banner = Banner::where('page', 'destination')->first();

        // $destination = Destination::first();
      
        return view('admin.destinatin.index', compact('logedUserData', 'banner'));

    }

}
