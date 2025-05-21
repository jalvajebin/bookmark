<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\HomeAboutUs;
use App\Models\HomeBanner;
use App\Models\HomeBannerTitle;
use App\Models\HomePageService;
use App\Models\HomePageTechnolagy;
use App\Models\HomeWhyChooseUs;
use App\Models\Seo;
use App\Models\WhatWeDo;
use App\Models\WhyWorkWith;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index(){
       
        $banner = Banner::where('page', 'home')->first();
        $why = WhyWorkWith::first();
        $whatWedo =WhatWeDo::first();
        return view('admin.home.index', compact('banner', 'why', 'whatWedo'));
    }
}
