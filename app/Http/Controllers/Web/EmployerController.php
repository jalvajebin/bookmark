<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\EmployerContact;
use App\Models\Testimonial;
use App\Models\WeRecruitFor;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index(){

        $banner = Banner::where('page', 'about')->first();

        $testimonials = Testimonial::orderBy('id', 'asc')->get();

        $recruit = WeRecruitFor::first();

        $counters = Counter::first();

        $contact = EmployerContact::first();
       
        return view('website.employer', compact('banner', 'testimonials' , 'recruit', 'counters' , 'contact'));
    }
}
