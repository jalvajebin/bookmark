<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\EmployerContact;
use App\Models\WeRecruitFor;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    public function index()
    {
        $banner = Banner::where('page', 'employer')->first();
        $employerContact = EmployerContact::first();
        $weRecruitFor = WeRecruitFor::first();
        // $seo = Seo::where('page', 'about')->first();
        return view('admin.employer.index', compact('banner', 'employerContact', 'weRecruitFor'));
    }

    public function addEmployerContactUs(Request $request)
    {
        // dd($request->all());       
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'phone_no' => 'required'
        ]);

        DB::beginTransaction();
        try {
             EmployerContact::updateOrCreate([
                'id' => $request->employer_contact_id
            ], [
                'heading' => $request->heading,
                'description' => $request->description,
                'phone_no'=> $request->phone_no,
            ]);
    
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->employer_contact_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function addWeRecruitFor(Request $request)
    {
        // dd($request->all());       
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
           
        ]);

        DB::beginTransaction();
        try {
             WeRecruitFor::updateOrCreate([
                'id' => $request->recruit_id
            ], [
                'heading' => $request->heading,
                'description' => $request->description,
               
            ]);
    
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->recruit_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
