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
        $banners = Banner::where('page', 'service')->first();
        $services = ServiceWeProvide::all();
                
      return view('website.service' , compact('banners' , 'services'));
    }
}
