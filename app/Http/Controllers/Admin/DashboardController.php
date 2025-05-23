<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionRequest;
use App\Models\Blog;
use App\Models\CareerOpening;
use App\Models\Country;
use App\Models\Course;
use App\Models\Job;
use App\Models\NewsEvents;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\ReferEarn;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\University;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function __construct()
    {
        if (Auth::check()) {
            return Redirect::to('dashboard')->send();
        }
    }

    public function index(Request $request)
    {
             
        $blogs = Blog::where('status', 1)->count();
        $jobs = Job::all()->count();

        $filterType = $request->input('filter', 'week');
        return view('admin.dashboard.index', compact('blogs','jobs'));
    }
}
