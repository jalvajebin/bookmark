<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Service;
use App\Models\ServiceWeProvide;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $banner = Banner::where('page', 'service')->first();
        // dd( $banners);
        $services = ServiceWeProvide::all();
                
      return view('website.service' , compact('banner' , 'services'));
    }
}
