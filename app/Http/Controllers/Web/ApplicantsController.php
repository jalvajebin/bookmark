<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    public function applicants(){

        return view('website.applicants');
    }

    public function findJob(){
        
        return view('website.findjob');
    }

    public function submitCv(){
        
        return view('website.submit-cv');
    }

    public function careerHub(){
        
        return view('website.career-hub');
    }
}
