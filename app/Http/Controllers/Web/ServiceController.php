<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $banners = Banner::where('page', 'service')->first();
      $service = Service::first();
      return view('website.service' , compact('banners' , 'service'));
    }
}
