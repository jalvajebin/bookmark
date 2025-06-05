<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CareerHub;
use App\Models\Destination;
use App\Models\Job;
use App\Models\JobLocation;
use App\Models\JobPositionType;
use App\Models\JobSchoolType;
use App\Models\JobSpecialism;
use App\Models\JobTag;
use App\Models\WeRecruitFor;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    public function applicants()
    {
        $destinations = Destination::all();

        $latestJobs = Job::latest()->take(8)->get();

        $weRecruitFor = WeRecruitFor::first();
        return view('website.applicants', compact('destinations', 'latestJobs', 'weRecruitFor'));
    }

    public function findJob(Request $request)
    {

        $jobs = Job::query();
        if ($request->has('school_type')) {
            $jobs->where('school_type', $request->school_type);
        }
        if ($request->has('location')) {
            $jobs->where('location', $request->location);
        }
        if ($request->has('specialism')) {
            $jobs->where('specialism', $request->specialism);
        }
        if ($request->has('position_type')) {
            $jobs->where('position_type', $request->position_type);
        }
        $locations      = JobLocation::withCount('jobs')->orderBy('title')->get();
        $schoolTypes    = JobSchoolType::withCount('jobs')->orderBy('title')->get();
        $specialisms    = JobSpecialism::withCount('jobs')->orderBy('title')->get();
        $positionTypes  = JobPositionType::withCount('jobs')->orderBy('title')->get();

        if ($request->filled('search')) {
            $keyword = $request->search;

            $jobs->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%');
            });
        }

        // $jobs = $jobs->paginate();
        $jobs = $jobs->paginate(5);
        return view('website.findjob', compact('jobs', 'schoolTypes', 'specialisms', 'positionTypes', 'locations'));
    }
    public function list(Request $request)
    {
        $jobs = Job::query();

        if ($request->filled('search')) {
            $jobs->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('school_type')) {
            $jobs->where('school_type', $request->school_type);
        }

        if ($request->filled('location')) {
            $jobs->where('location', $request->location);
        }

        if ($request->filled('specialism')) {
            $jobs->where('specialism', $request->specialism);
        }

        if ($request->filled('position_type')) {
            $jobs->where('position_type', $request->position_type);
        }

        if ($request->filled('search')) {
            $keyword = $request->search;

            $jobs->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%');
            });
        }

        $jobs = $jobs->paginate(10);

        $html = view('website.partials.job_list', compact('jobs'))->render();

        return response()->json(['html' => $html]);
    }

    public function submitCv()
    {
        $destinations = Destination::all();

        return view('website.submit-cv', compact('destinations'));
    }

    public function careerHub()
    {

        $careers = CareerHub::all();

        // dd($tags)
        return view('website.career-hub', compact('careers'));
    }

    public function careerHubDetail(Request $request, $slug)
    {

        $career = CareerHub::where('slug', $slug)->firstOrFail();

        // dd($tags)
        return view('website.career-hub-details', compact('career'));
    }


    public function jobDetail(Request $request, $slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();

        // Assuming these relations or you can create accessors
        // Example: $job->location_name, $job->school_type_name, etc.
        return view('website.job-detail', compact('job'));
    }

    public function postVacancy()
    {
        $destinations = Destination::all();

        return view('website.post-vacancy', compact('destinations'));
    }
}
