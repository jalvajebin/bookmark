<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $logedUserData = auth()->user(); 

        $banner = Banner::where('page', 'services')->first();
    
        return view('admin.services.index', compact('logedUserData', 'banner'));

    }
}
