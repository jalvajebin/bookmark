<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $logedUserData = auth()->user(); 

        $banner = Banner::where('page', 'services')->first();

       
        
    
        return view('admin.services.index', compact('logedUserData', 'banner'));

    }
}
