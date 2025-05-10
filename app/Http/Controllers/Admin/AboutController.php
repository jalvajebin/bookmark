<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ContactExport;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\ContactEnquiry;
use App\Models\LearnAboutUs;
use App\Models\MisionVision;
use App\Models\Seo;
use App\Models\WhyChooseUs;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    public function index()
    {
        $banner = Banner::where('page', 'about')->first();
        // $whyChooseUs = WhyChooseUs::first();
        $learnAboutUs = LearnAboutUs::first();


        $aboutUs = AboutUs::first();
        // $seo = Seo::where('page', 'about')->first();
        // return view('admin.about.index', compact('banner', 'whyChooseUs', 'missionVision', 'aboutUs', 'seo'));
        return view('admin.about.index', compact('banner', 'aboutUs', 'learnAboutUs'));
    }

    public function getContactEnquiry()
    {
        $quote = ContactEnquiry::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }



    public function addMissionVision(Request $request)
    {

        $request->validate([
            'mission_title' => 'required',
            'mission_description' => 'required',
            'vision_title' => 'required',
            'vision_description' => 'required',
            'mission_image' => $request->mission_vision_id ? 'image|max:2048' : 'required|image|max:2048',
            'vision_image' => $request->mission_vision_id ? 'image|max:2048' : 'required|image|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $missionVision  = MisionVision::updateOrCreate([
                'id' => $request->mission_vision_id
            ], [
                'mission_title' => $request->mission_title,
                'mission_description' => $request->mission_description,
                'vision_title' => $request->vision_title,
                'vision_description' => $request->vision_description,
                'missionImageAlt' => $request->mission_image_alt,
                'visionImageAlt' => $request->vision_image_alt,
            ]);

            if ($request->hasFile('mission_image')) {
                $missionVision->clearMediaCollection('missionImage');
                $missionVision->addMediaFromRequest('mission_image')->toMediaCollection('missionImage');
            }
            if ($request->hasFile('vision_image')) {
                $missionVision->clearMediaCollection('visionImage');
                $missionVision->addMediaFromRequest('vision_image')->toMediaCollection('visionImage');
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->mission_vision_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function addAboutUs(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image1' => $request->about_us_id ? 'image|max:2048' : 'required|image|max:2048',
            'online_support_no' => 'required',


        ]);


        DB::beginTransaction();
        try {
            $aboutUs = AboutUs::updateOrCreate([
                'id' => $request->about_us_id
            ], [

                'title' => $request->title,
                'description' => $request->description,
                'image1_alt' => $request->image1_alt,
                'online_support_number' => $request->online_support_no,

            ]);
            if ($request->hasFile('image1')) {
                $aboutUs->clearMediaCollection('employee_image');
                $aboutUs->addMediaFromRequest('image1')->toMediaCollection('image1_name');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->about_us_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function addLearnAboutUs(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'button_title' => 'required',
            'button_link' => 'required|url',
            'employee_description' => 'required',
            'employee_content_1' => 'required',
            'employee_content_2' => 'required',
            'employee_content_3' => 'required',
            'employer_description' => 'required',
            'employer_content_1' => 'required',
            'employer_content_2' => 'required',
            'employer_content_3' => 'required',
            'employee_image' => $request->learn_about_us_id ? 'image|max:2048' : 'required|image|max:2048',
            'employer_image' => $request->learn_about_us_id ? 'image|max:2048' : 'required|image|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $learnAboutUs = LearnAboutUs::updateOrCreate([
                'id' => $request->learn_about_us_id
            ], [
                'title' => $request->title,
                'heading' => $request->heading,
                'button_title' => $request->button_title,
                'button_link' => $request->button_link,
                'employee_description' => $request->employee_description,
                'employee_content_1' => $request->employee_content_1,
                'employee_content_2' => $request->employee_content_2,
                'employee_content_3' => $request->employee_content_3,
                'employer_description' => $request->employer_description,
                'employer_content_1' => $request->employer_content_1,
                'employer_content_2' => $request->employer_content_2,
                'employer_content_3' => $request->employer_content_3,
                'employee_alt' => $request->employee_alt,
                'employer_alt' => $request->employer_alt,
            ]);
            
            if ($request->hasFile('employee_image')) {
                $learnAboutUs->clearMediaCollection('employee_image_name');
                $learnAboutUs->addMediaFromRequest('employee_image')->toMediaCollection('employee_image_name');
            }
            if ($request->hasFile('employer_image')) {
                $learnAboutUs->clearMediaCollection('employer_image_name');
                $learnAboutUs->addMediaFromRequest('employer_image')->toMediaCollection('employer_image_name');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->learn_about_us_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function contactExport(Request $request)
    {
        $ids = $request->ids ?? [];

        return Excel::download(new ContactExport($ids), 'contact-enquiries.xlsx');
    }

    public function deleteContactEnquiry(Request $request)
    {
        $contact  = ContactEnquiry::whereIn('id', $request->ids)->first();

        if (!isset($contact)) {
            return response()->json(['success' => false, 'message' => "Not found!"]);
        }
        $contact->delete();
        return response()->json(['success' => true, 'message' => "Deleted"]);
    }

    public function getDeliveryDetails($message_id)
    {
        $messageurl = "https://api.postmarkapp.com/messages/outbound/$message_id/details";
        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'X-Postmark-Server-Token' => env('POSTMARK_TOKEN'),
            'Content-Type' => 'application/json',
        ])->get($messageurl);

        $results = $response['MessageEvents'];
        $view = view('admin.email', ['results' => $results])->render();

        return response()->json(['view' => $view]);
    }
}
