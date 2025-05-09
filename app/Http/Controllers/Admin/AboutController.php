<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ContactExport;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\ContactEnquiry;
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
        $banner = Banner::where('page_name', 'about-us')->first();
        // $whyChooseUs = WhyChooseUs::first();
        // $missionVision = MisionVision::first();
        // $aboutUs = AboutUs::first();
        // $seo = Seo::where('page', 'about')->first();
        // return view('admin.about.index', compact('banner', 'whyChooseUs', 'missionVision', 'aboutUs', 'seo'));
        return view('admin.about.index', compact('banner'));

    }

    public function getContactEnquiry()
    {
        $quote = ContactEnquiry::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function addWhyChooseUs(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'image1_name' => $request->id ? 'image|max:2048' : 'required|image|max:2048',
            'image2_name' => $request->id ? 'image|max:2048' : 'required|image|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $whyChooseUs = WhyChooseUs::updateOrCreate([
                'id' => $request->id
            ], [

                'title' => $request->title,
                'heading' => $request->heading,    
                'description' => $request->description,
                'address' => $request->address,
                'maplink' => $request->maplink,
                'image1alt' => $request->image1alt,
                'image2alt' => $request->image2alt,
            ]);
            if ($request->hasFile('image1_name')) {
                $whyChooseUs->clearMediaCollection('image1');
                $whyChooseUs->addMediaFromRequest('image1_name')->toMediaCollection('image1');
            }
            if ($request->hasFile('image2_name')) {
                $whyChooseUs->clearMediaCollection('image2');
                $whyChooseUs->addMediaFromRequest('image2_name')->toMediaCollection('image2');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function addMissionVision(Request $request)
    {
    
        $request->validate([
            'mission_title' => 'required',
            'mission_description' => 'required',
            'vision_title' => 'required',
            'vision_description' => 'required',
            'mission_image' =>$request->mission_vision_id ? 'image|max:2048' : 'required|image|max:2048',
            'vision_image' =>$request->mission_vision_id ? 'image|max:2048' : 'required|image|max:2048',
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
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'count_1_name' => 'required',
            'count1' => 'required',
            'count_2_name' => 'required',
            'count2' => 'required',
            'count_3_name' => 'required',
            'count3' => 'required',

        ]);
        
        
        DB::beginTransaction();
        try {
          AboutUs::updateOrCreate([
                'id' => $request->about_us_id
            ], [

                'title' => $request->title,
                'heading' => $request->heading,
                'short_description' => $request->short_description,    
                'description' => $request->description,
                'count_1_name'=> $request->count_1_name,
                'count1'=> $request->count1,
                'count_2_name'=> $request->count_2_name,
                'count2'=> $request->count2,
                'count_3_name'=> $request->count_3_name,
                'count_3'=> $request->count3,
               
            ]);
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->about_us_id ? "Successfully Updated" : "Successfully Added"]);
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
