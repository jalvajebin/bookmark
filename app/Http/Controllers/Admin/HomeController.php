<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\HomeAboutUs;
use App\Models\HomeBanner;
use App\Models\HomeBannerTitle;
use App\Models\HomePageService;
use App\Models\HomePageTechnolagy;
use App\Models\HomeWhyChooseUs;
use App\Models\MeetOurTeam;
use App\Models\Seo;
use App\Models\WhatWeDo;
use App\Models\WhyWorkWith;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index(){
       
        $banner = Banner::where('page', 'home')->first();
        $why = WhyWorkWith::first();
        $whatWedo =WhatWeDo::first();
        $contactBanner = Banner::where('page', 'homeContact')->first();
        return view('admin.home.index', compact('banner', 'why', 'whatWedo','contactBanner'));
    }

    public function getData(){
        $quote = MeetOurTeam::query()->orderBy('id', 'desc');
        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

     public function addhomeTeam(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'team_image' => $request->team_id ? 'image|max:2048' : 'required|image|max:2048',

        ]);

        DB::beginTransaction();
        try {
            $team = MeetOurTeam::updateOrCreate([
                'id' => $request->team_id
            ], [

                'name' => $request->name,
                'description' => $request->description,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
            ]);
            if ($request->hasFile('team_image')) {
                $team->clearMediaCollection('team_images');
                $team->addMediaFromRequest('team_image')->toMediaCollection('team_images');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->team_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    

     public function getTeamById($id){
        $team = MeetOurTeam::findOrfail($id);
        return $team;
    }


     public function deleteTeam($id){
        $team = MeetOurTeam::findOrfail($id);
        $team->delete();

         return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully!'
        ]);
    }

    


}
