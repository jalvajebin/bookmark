<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $logedUserData = auth()->user(); 
        $banner = Banner::where('page', 'service')->first();
        // dd($banner);
        $service = Service::first();
        return view('admin.services.index', compact('logedUserData', 'banner' , 'service'));

    }

    public function updateService(Request $request){
      
       

        $request->validate([
            'title' => 'required',
            'title_two' => 'required',
            'read_more' => 'required',
            'read_more_two' => 'required',
            'link' => 'required',
            'link_two' => 'required',
            'description' => 'required',
            'description_two' => 'required',
            'service_image' => $request->service_id ? 'image|max:2048' : 'required|image|max:2048',
           
        ]);

        DB::beginTransaction();
        try {
            $banner = Service::updateOrCreate([
                'id' => $request->service_id
            ], [
                'title' => $request->title,
                'title_two' => $request->title_two,
                'discription' => $request->description,
                'discription_two' => $request->description_two,

                'read_more' => $request->read_more,
                'read_more_two' => $request->read_more_two,

                'link' => $request->link,
                'link_two' => $request->link_two,


               
            ]);
            if ($request->hasFile('service_image')) {
                $banner->clearMediaCollection('images');
                $banner->addMediaFromRequest('service_image')->toMediaCollection('images');
            }
            if ($request->hasFile('service_image_two')) {
                $banner->clearMediaCollection('imagesTwo');
                $banner->addMediaFromRequest('service_image_two')->toMediaCollection('imagesTwo');
            }
            
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->service_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }

    }
}
