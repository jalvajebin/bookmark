<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class HomeContactBannerController extends Controller
{
    public function updateBanner(Request $request)
    {
        // dd($request->all());       
        $request->validate([
            'title' => 'required',
            'contact_description' => 'required',
            'contact_image' => $request->banner_contact_id ? 'image|max:2048' : 'required|image|max:2048',
            'contact_alt' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $banner = Banner::updateOrCreate([
                'id' => $request->banner_contact_id
            ], [
                'title' => $request->title,
                'description'=> $request->contact_description,
                'alt' => $request->contact_alt,
                'page'=> $request->page,
            ]);
            if ($request->hasFile('contact_image')) {
                $banner->clearMediaCollection('images');
                $banner->addMediaFromRequest('contact_image')->toMediaCollection('images');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->banner_contact_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
