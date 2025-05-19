<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobPositionType;
use App\Models\JobSchoolType;
use App\Models\JobSpecialism;
use App\Models\JobTag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $destinations   = Destination::all();
            $locations      = JobLocation::orderBy('title')->get();
            $categories     = JobCategory::orderBy('title')->get();
            $schoolTypes    = JobSchoolType::orderBy('title')->get();
            $specialisms    = JobSpecialism::orderBy('title')->get();
            $positionTypes  = JobPositionType::orderBy('title')->get();

        return view('admin.jobs.create', compact(
            'locations',
            'categories',
            'schoolTypes',
            'specialisms',
            'positionTypes',
            'destinations',
        ));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title'         => 'required|string',
            'company_name'  => 'required|string',
            'location'      => 'required|integer',
            'category'      => 'required|integer',
            'salary_rang'   => 'required|string',
            'date'          => 'required|date',
            'type'          => 'required',
            'destination'   => 'required',
            'description'   => 'required|string',
            'school_type'   => 'required|integer',
            'specialism'    => 'required|integer',
            'position_type' => 'required|integer',
            'main_image'    => 'required|image',
        ]);


        $job = new Job();
        $job->title = $request->input('title');
        $job->company_name = $request->input('company_name');
        $job->location = $request->input('location');
        $job->category = $request->input('category');
        $job->salary_rang = $request->input('salary_rang');
        $job->date = Carbon::parse($request->input('date'))->format('Y-m-d');
        $job->job_type = $request->input('type');
        $job->destination_id = $request->input('destination');
        $job->description = $request->input('description');
        $job->school_type = $request->input('school_type');
        $job->specialism = $request->input('specialism');
        $job->position_type = $request->input('position_type');

        $job->save();

        if ($request->hasFile('main_image')) {
            $job->addMediaFromRequest('main_image')->toMediaCollection('main_images');
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
        $locations      = JobLocation::orderBy('title')->get();
        $categories     = JobCategory::orderBy('title')->get();
        $schoolTypes    = JobSchoolType::orderBy('title')->get();
        $specialisms    = JobSpecialism::orderBy('title')->get();
        $positionTypes  = JobPositionType::orderBy('title')->get();
        $destinations   = Destination::orderBy('name')->get();


        return view('admin.jobs.edit', compact('job', 'locations',
            'categories',
            'schoolTypes',
            'specialisms',
            'positionTypes',
            'destinations',));
    }

    public function update(Request $request)
    {

        $id = $request->job_id;
        $job = Job::findOrFail($id);
        $request->validate([
            'title'         => 'required|string',
            'company_name'  => 'required|string',
            'location'      => 'required|integer',
            'category'      => 'required|integer',
            'salary_rang'   => 'required|string',
            'type'          => 'required',
            'destination'   => 'required',
            'description'   => 'required|string',
            'school_type'   => 'required|integer',
            'specialism'    => 'required|integer',
            'position_type' => 'required|integer',
            'main_image'   => ($id ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $job->title = $request->input('title');
        $job->company_name = $request->input('company_name');
        $job->location = $request->input('location');
        $job->category = $request->input('category');
        $job->salary_rang = $request->input('salary_rang');
        $job->date = Carbon::parse($request->input('date'))->format('Y-m-d');
        $job->job_type = $request->input('type');
        $job->destination_id = $request->input('destination');
        $job->description = $request->input('description');
        $job->school_type = $request->input('school_type');
        $job->specialism = $request->input('specialism');
        $job->position_type = $request->input('position_type');

        $job->save();

        if ($request->hasFile('main_image')) {
            $job->clearMediaCollection('main_images');
            $job->addMediaFromRequest('main_image')->toMediaCollection('main_images');
        }

        return response()->json([
            'title' => 'Success!',
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

    public function storeCategory(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $jobCategory = JobCategory::updateOrCreate([
                'id' => $request->category_id
            ], [
                'title' => $request->title,

            ]);

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->category_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getCategoryData()
    {
        $quote = JobCategory::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function editCategory($id)
    {
        $jobCategory = JobCategory::findOrfail($id);
        return $jobCategory;
    }

    public function destroyCategory($id){
        $jobCategory = JobCategory::findOrfail($id);
        $jobCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully!'
        ]);
    }


    public function storeLocation(Request $request)
    {

//        dd($request->all());

        $request->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $jobLocation = JobLocation::updateOrCreate([
                'id' => $request->location_id
            ], [
                'title' => $request->title,

            ]);

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->location_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getLocationData()
    {
        $quote = JobLocation::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function editLocation($id)
    {
        $jobLocation = JobLocation::findOrfail($id);
        return $jobLocation;
    }

    public function destroyLocation($id){
        $jobLocation = JobLocation::findOrfail($id);
        $jobLocation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully!'
        ]);
    }

    public function storeSchoolType(Request $request)
    {


        $request->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $jobSchoolType = JobSchoolType::updateOrCreate([
                'id' => $request->school_type_id
            ], [
                'title' => $request->title,

            ]);

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->school_type_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getSchoolTypeData()
    {
        $quote = JobSchoolType::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function editSchoolType($id)
    {
        $jobSchoolType = JobSchoolType::findOrfail($id);
        return $jobSchoolType;
    }

    public function destroySchoolType($id){
        $jobSchoolType = JobSchoolType::findOrfail($id);
        $jobSchoolType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully!'
        ]);
    }


    public function storeSpecialism(Request $request)
{


    $request->validate([
        'title' => 'required',
    ]);

    DB::beginTransaction();
    try {
        $jobSpecialism = JobSpecialism::updateOrCreate([
            'id' => $request->specialism_id
        ], [
            'title' => $request->title,

        ]);

        DB::commit();
        return response()->json(['status' => true, 'message' => $request->specialism_id ? "Successfully Updated" : "Successfully Added"]);
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['status' => false, 'message' => $e->getMessage()]);
    }
}

    public function getSpecialismData()
    {
        $quote = JobSpecialism::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function editSpecialism($id)
    {
        $jobSpecialism = JobSpecialism::findOrfail($id);
        return $jobSpecialism;
    }

    public function destroySpecialism($id){
        $jobSpecialism = JobSpecialism::findOrfail($id);
        $jobSpecialism->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully!'
        ]);
    }


    public function storePositionType(Request $request)
    {


        $request->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $jobPositionType = JobPositionType::updateOrCreate([
                'id' => $request->position_type_id
            ], [
                'title' => $request->title,

            ]);

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->position_type_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getPositionTypeData()
    {
        $quote = JobPositionType::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function editPositionType($id)
    {
        $jobPositionType = JobPositionType::findOrfail($id);
        return $jobPositionType;
    }

    public function destroyPositionType($id){
        $jobPositionType = JobPositionType::findOrfail($id);
        $jobPositionType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully!'
        ]);
    }


}



