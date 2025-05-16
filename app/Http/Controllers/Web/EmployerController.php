<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index(){

        $banner = Banner::where('page', 'about')->first();
    
        return view('website.employer', compact('banner'));
    }
}
