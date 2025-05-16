<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Job;
use App\Models\JobTag;
use App\Models\WeRecruitFor;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    public function applicants(){
        $destinations = Destination::all();

        $latestJobs = Job::latest()->get();

        $weRecruitFor = WeRecruitFor::first();
        return view('website.applicants', compact('destinations', 'latestJobs', 'weRecruitFor'));
    }

    public function findJob(){
        
        return view('website.findjob');
    }

    public function submitCv(){
        
        return view('website.submit-cv');
    }

    public function careerHub(){

        $jobs = Job::all();
        $tags = JobTag::all();

       

        // dd($tags);
        
        return view('website.career-hub', compact('jobs', 'tags' ));
    }
}
