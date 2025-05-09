<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAboutUs;
use App\Models\HomeBanner;
use App\Models\HomeBannerTitle;
use App\Models\HomePageService;
use App\Models\HomePageTechnolagy;
use App\Models\HomeWhyChooseUs;
use App\Models\Seo;
use App\Models\WhatWeDo;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index(){
        $whatWedo = WhatWeDo::first();
        $aboutUs = HomeAboutUs::first();
        $whyChooseUs = HomeWhyChooseUs::first();
        $service = HomePageService::first();
        $technolagy = HomePageTechnolagy::first();
        $banner = HomeBanner::first();
        $seo = Seo::where('page', 'home')->first();

        return view('admin.home.index', compact('banner', 'whatWedo', 'aboutUs', 'whyChooseUs', 'service', 'technolagy', 'seo'));
    }

    public function getBannerData(){
        $homeBanner = HomeBannerTitle::orderBy('id', 'desc');
        return DataTables::of($homeBanner)
            ->addIndexColumn()
            ->editColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->format("Y-m-d H:i:s");
            })->make(true);
    }

    public function addhomeBanner(Request $request){

        $request->validate([
            'title' => 'required',

        ]);  
      
        DB::beginTransaction();
        try {
            HomeBannerTitle::updateOrCreate([
                  'id' => $request->home_banner_id
              ], [
  
                  'title' => $request->title,
            
              ]);
              
              DB::commit();
              return response()->json(['status' => true, 'message' => $request->home_banner_id ? "Successfully Updated" : "Successfully Added"]);
          } catch (Exception $e) {
              DB::rollback();
              return  response()->json(['status' => false, 'message' => $e->getMessage()]);
          }
    }

    public function getBannerById($id)
    {
        $banner = HomeBannerTitle::findOrfail($id);
        return $banner;
    }

    public function deleteBanner($id)
    {
        $banner = HomeBannerTitle::findOrfail($id);
        $banner->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully!'
        ]);
    }

    public function addHomeBannerContent(Request $request){

        $request->validate([

            'description' => 'required',
            'button_name' => 'required',
            'button_link' => 'required',
        ]);

        DB::beginTransaction();
        try {
            HomeBanner::updateOrCreate([
                'id' => $request->home_banner_content_id
            ], [

                'description' => $request->description,
                'button_name' =>  $request->button_name,
                'button_link' => $request->button_link

            ]);

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->home_banner_content_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function addWhatWeDo(Request $request){

        $request->validate([
            'title_1' => 'required',
            'title_2' => 'required',
            'title_3' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'image_1' => $request->what_we_do_id ? 'image|max:2048' : 'required|image|max:2048',
            'image_2' => $request->what_we_do_id ? 'image|max:2048' : 'required|image|max:2048',
            'image_3' => $request->what_we_do_id ? 'image|max:2048' : 'required|image|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $whatWedo = WhatWeDo::updateOrCreate([
                'id' => $request->what_we_do_id
            ], [

                'title_1' => $request->title_1,
                'description_1' => $request->description_1,    
                'image1_alt' => $request->image_1_alt,
                'title_2' => $request->title_2,
                'description_2' => $request->description_2,    
                'image2_alt' => $request->image_2_alt,
                'title_3' => $request->title_3,
                'description_3' => $request->description_3,    
                'image3_alt' => $request->image_3_alt,        
                
            ]);
            if ($request->hasFile('image_1')) {
                $whatWedo->clearMediaCollection('image1');
                $whatWedo->addMediaFromRequest('image_1')->toMediaCollection('image1');
            }
            if ($request->hasFile('image_2')) {
                $whatWedo->clearMediaCollection('image2');
                $whatWedo->addMediaFromRequest('image_2')->toMediaCollection('image2');
            }
            if ($request->hasFile('image_3')) {
                $whatWedo->clearMediaCollection('image3');
                $whatWedo->addMediaFromRequest('image_3')->toMediaCollection('image3');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->what_we_do_id ? "Successfully Updated" : "Successfully Added"]);
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
            'description' => 'required',
            'image' => $request->home_about_us_id ? 'image|max:2048' : 'required|image|max:2048',


        ]);
        
      
        DB::beginTransaction();
        try {
          $aboutUs = HomeAboutUs::updateOrCreate([
                'id' => $request->home_about_us_id
            ], [

                'title' => $request->title,
                'heading' => $request->heading,
                'description' => $request->description,
                'image_alt' => $request->image_alt,

               
            ]);
            if ($request->hasFile('image_name')) {
                $aboutUs->clearMediaCollection('image');
                $aboutUs->addMediaFromRequest('image_name')->toMediaCollection('image');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->home_about_us_id? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function addWhyChooseUS(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'count_1_title' => 'required',
            'count1' => 'required',
            'count_2_title' => 'required',
            'count2' => 'required',
            'count_3_title' => 'required',
            'count3' => 'required',
            'count_4_title' => 'required',
            'count4' => 'required',
            'image_file_name' => $request->home_why_choose_us_id ? 'image|max:2048' : 'required|image|max:2048',
        ]);  
      
        DB::beginTransaction();
        try {
          $whyChooseUs = HomeWhyChooseUs::updateOrCreate([
                'id' => $request->home_why_choose_us_id
            ], [

                'heading' => $request->heading,
                'description' => $request->description,
                'image_alt' => $request->image_alt,
                'count_1_title'=> $request->count_1_title,
                'count1'=> $request->count1,
                'count_2_title'=> $request->count_2_title,
                'count2'=> $request->count2,
                'count_3_title'=> $request->count_3_title,
                'count_3'=> $request->count3,
                'count_4_title'=> $request->count_4_title,
                'count_4'=> $request->count4,
               
            ]);
            if ($request->hasFile('image_file_name')) {
                $whyChooseUs->clearMediaCollection('image');
                $whyChooseUs->addMediaFromRequest('image_file_name')->toMediaCollection('image');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->home_why_choose_us_id? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function addService(Request $request){
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'description' => 'required',
        ]);  
      
        DB::beginTransaction();
        try {
            HomePageService::updateOrCreate([
                  'id' => $request->home_service_id
              ], [
  
                  'title' => $request->title,
                  'heading' => $request->heading,
                  'description' => $request->description,
            
              ]);
              
              DB::commit();
              return response()->json(['status' => true, 'message' => $request->home_service_id ? "Successfully Updated" : "Successfully Added"]);
          } catch (Exception $e) {
              DB::rollback();
              return  response()->json(['status' => false, 'message' => $e->getMessage()]);
          }
    }
    
    public function addTechnolagy(Request $request){

        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'description' => 'required',
        ]);  
      
        DB::beginTransaction();
        try {
            HomePageTechnolagy::updateOrCreate([
                  'id' => $request->home_technolagy_id
              ], [
  
                  'title' => $request->title,
                  'heading' => $request->heading,
                  'description' => $request->description,
            
              ]);
              
              DB::commit();
              return response()->json(['status' => true, 'message' => $request->home_technolagy_id ? "Successfully Updated" : "Successfully Added"]);
          } catch (Exception $e) {
              DB::rollback();
              return  response()->json(['status' => false, 'message' => $e->getMessage()]);
          }
    }
}
