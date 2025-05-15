<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Job;
use App\Models\JobTag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    public function index()
    {
        return view('admin.jobs.index');
    }
    public function create()
    {
        $tagLoops = JobTag::orderBy('id', 'DESC')->get();
        $destinations = Destination::orderBy('id', 'DESC')->get();

        return view('admin.jobs.create', compact('destinations'));
    }


    public function store(Request $request)
    {
        // Show the input for debugging if needed
        // dd($request->all());

        // Validate request
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',

            'main_image' => 'required|image|max:2048',
            'location' => 'required|string|max:255',
            'salary_min' => 'required|numeric',
            'salary_max' => 'required|numeric',
            'posted_date' => 'required|date',
            'start_date' => 'nullable|date',
            'alt' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create Job
        $job = new Job();
        $job->title = trim($request->title);
        $job->destination_id = trim($request->destination);
        $job->location = trim($request->location);
        $job->salary_min = trim($request->salary_min);
        $job->salary_max = trim($request->salary_max);
        $job->posted_date = trim($request->posted_date);
        $job->start_date = trim($request->start_date);
        $job->alt = trim($request->alt);
        $job->description = trim($request->description);

        $job->save(); // Save first so media can attach to it

        // Upload image via Spatie Media Library
        if ($request->hasFile('main_image')) {
            $job->addMediaFromRequest('main_image')->toMediaCollection('images');
        }

        return response()->json([
            'title' => 'Success!',
            'message' => 'Job added successfully.',
            'icon' => 'success'
        ]);
    }




    public function getData()
    {
        try {
            $jobs = Job::orderBy('id', 'desc');
            return DataTables::of($jobs)
                ->addIndexColumn()
                ->make(true);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $destinations = Destination::all();
        return view('admin.jobs.edit', compact('job', 'destinations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'destination' => 'required|exists:destinations,id',
            'description' => 'required|string',
            'salary_min' => 'required|numeric',
            'salary_max' => 'required|numeric',
            'posted_date' => 'required|date',
            'start_date' => 'nullable|date',
            'alt' => 'nullable|string|max:255',

        ]);

        $job = Job::findOrFail($id);
        $job->title = $request->title;
        $job->destination_id = $request->destination;
        $job->location = $request->location;
        $job->description = $request->description;
        $job->location = trim($request->location);
        $job->salary_min = trim($request->salary_min);
        $job->salary_max = trim($request->salary_max);
        $job->posted_date = trim($request->posted_date);
        $job->start_date = trim($request->start_date);
        $job->alt = trim($request->alt);

        if ($request->hasFile('main_image')) {
            $job->clearMediaCollection('images');
            $job->addMediaFromRequest('main_image')->toMediaCollection('images');
            $message = "You Have Successfully Updated";
            $status = true;
            $title = "Added";
            $icon = "success";
        }

        $job->save();

        return response()->json([
            'title' => 'Success',
            'message' => 'Job updated successfully.',
            'icon' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return response()->json([
            'message' => 'Job deleted successfully'
        ]);
    }
}
