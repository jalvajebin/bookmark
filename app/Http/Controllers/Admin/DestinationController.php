<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Destination;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DestinationController extends Controller
{

    public function index()
    {
        $logedUserData = auth()->user();
        $banner = Banner::where('page', 'destination')->first();

        // $destination = Destination::first();

        return view('admin.destination.index', compact('logedUserData', 'banner'));
    }


    public function create(Request $request)
    {
        return view('admin.destination.create');
    }

    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'title' => 'required|max:100',
        //         'main_image' => 'required|image|max:2048',
        //         'inner_image' => 'required|image|max:2048',
        //         'inner1_image' => 'required|image|max:2048',
        //         'description' => 'required',
        //         'description_1' => 'required',

        //     ]
        // );
       

        $destination = new Destination();
        $destination->name = $request->input('title');
        $destination->main_image_alt = $request->input('alt');
        $destination->inner_image_1_alt = $request->input('inner_image_alt');
        $destination->inner_image_2_alt = $request->input('inner1_image_alt');
        $destination->description = $request->input('description');
        $destination->description_1 = $request->input('description_1');

        if ($request->hasFile('main_image')) {
            $destination->addMediaFromRequest('main_image')->toMediaCollection('main_images');
        }
        if ($request->hasFile('inner_image')) {
            $destination->addMediaFromRequest('inner_image')->toMediaCollection('inner_images');
        }

        if ($request->hasFile('inner1_image')) {
            $destination->addMediaFromRequest('inner1_image')->toMediaCollection('inner1_images');
        }


        $store = $destination->save();

        if ($store == true) {
            $title = "Added";
            $message = "Added Successfully";
            $icon = "success";
            $status = true;
            cache('destination_success', true);
        } else {
            $title = "Failed";
            $message = "Something Went Wrong";
            $icon = "danger";
            $status = false;
        }

        return response()->json([
            'title' => $title,
            'message' => $message,
            'icon' => $icon,
            'status' => $status,
        ]);
    }

    public function getData()
    {
        $quote = Destination::query()->orderBy('id', 'desc');
        
        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
    
        return view('admin.destination.edit', compact('destination'));
    }

    public function update(Request $request)
    {
        // $request->validate(
        //     [
        //         'title' => 'required|max:100',
        //         'main_image' => 'required|image|max:2048',
        //         'inner_image' => 'required|image|max:2048',
        //         'inner1_image' => 'required|image|max:2048',
        //         'description' => 'required',
        //         'description_1' => 'required',

        //     ]
        // );
        $id = $request->destination_id;
        // dd($id);
        $destination = Destination::findOrFail($id);

        $destination->name = $request->input('title');
        $destination->main_image_alt = $request->input('alt');
        $destination->inner_image_1_alt = $request->input('inner_image_alt');
        $destination->inner_image_2_alt = $request->input('inner1_image_alt');
        $destination->description = $request->input('description');
        $destination->description_1 = $request->input('description_1');

        if ($request->hasFile('main_image')) {
            $destination->clearMediaCollection('main_images');
            $destination->addMediaFromRequest('main_image')->toMediaCollection('main_images');
        }
        if ($request->hasFile('inner_image')) {
            $destination->clearMediaCollection('inner_images');
            $destination->addMediaFromRequest('inner_image')->toMediaCollection('inner_images');
        }

        if ($request->hasFile('inner1_image')) {
            $destination->clearMediaCollection('inner1_images');
            $destination->addMediaFromRequest('inner1_image')->toMediaCollection('inner1_images');
        }


        $store = $destination->save();

        if ($store == true) {
            $title = "Updated";
            $message = "Updated Successfully";
            $icon = "success";
            $status = true;
            cache('destination_success', true);
        } else {
            $title = "Failed";
            $message = "Something Went Wrong";
            $icon = "danger";
            $status = false;
        }

        return response()->json([
            'title' => $title,
            'message' => $message,
            'icon' => $icon,
            'status' => $status,
        ]);
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->clearMediaCollection('main_images');
        $destination->clearMediaCollection('inner_images');
        $destination->clearMediaCollection('inner1_images');
        $destination->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }

    
}
