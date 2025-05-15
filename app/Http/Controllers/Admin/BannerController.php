<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BannerController extends Controller
{
    public function updateBanner(Request $request)
    {
        // dd($request->all());       
        $request->validate([
            'banner_title' => 'required',
            'description' => 'required',
            'banner_image' => $request->banner_id ? 'image|max:2048' : 'required|image|max:2048',
            'banner_alt' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $banner = Banner::updateOrCreate([
                'id' => $request->banner_id
            ], [
                'title' => $request->banner_title,
                'description'=> $request->description,
                'alt' => $request->banner_alt,
                'page'=> $request->banner_page,
            ]);
            if ($request->hasFile('banner_image')) {
                $banner->clearMediaCollection('images');
                $banner->addMediaFromRequest('banner_image')->toMediaCollection('images');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->banner_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
