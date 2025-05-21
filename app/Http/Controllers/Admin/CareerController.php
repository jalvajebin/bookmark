<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CareerHub;
use App\Models\CareerTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CareerController extends Controller
{
    public function index()
    {
        $logedUserData = auth()->user();
        $banner = Banner::where('page', 'career')->first();

        // $destination = Destination::first();

        return view('admin.career.index', compact('logedUserData', 'banner'));
    }


    public function create(Request $request)
    {
        return view('admin.career.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'main_image' => 'required|image|max:2048',
            'date' => 'required',
            'inner_image' => 'required|image|max:2048',
            'inner1_image' => 'required|image|max:2048',
            'description' => 'required',
            'description_1' => 'required',

        ]);

        $career = new CareerHub();
        $career->title = $request->input('title');
        $career->description = $request->input('description');
        $career->description_1 = $request->input('description_1');
        $career->date = now();
        $career->status = 1;


        $career->save();

        // Media uploads
        if ($request->hasFile('main_image')) {
            $career->addMediaFromRequest('main_image')->toMediaCollection('main_images');
        }
        if ($request->hasFile('inner_image')) {
            $career->addMediaFromRequest('inner_image')->toMediaCollection('inner_images');
        }
        if ($request->hasFile('inner1_image')) {
            $career->addMediaFromRequest('inner1_image')->toMediaCollection('inner1_images');
        }

        return response()->json([
            'title' => 'Added',
            'message' => 'Added Successfully',
            'icon' => 'success',
            'status' => true,
        ]);
    }


    public function getData()
    {
        $quote = CareerHub::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function edit($id)
    {
        $career = CareerHub::findOrFail($id);

        return view('admin.career.edit', compact('career'));
    }

    public function update(Request $request)
    {
        //     dd($request->all());
        $request->validate([
            'title' => 'required|max:100',
            'main_image' => 'nullable|max:2048',
            'inner_image' => 'nullablemax:2048',
            'inner1_image' => 'nullable|image|max:2048',
            'description' => 'required',
            'description_1' => 'required',

        ]);

        $id = $request->career_id;
        $career = CareerHub::findOrFail($id);
        $career->title = $request->input('title');
        $career->description = $request->input('description');
        $career->description_1 = $request->input('description_1');
        $career->date = now();
        $career->status = 1;



        if ($request->hasFile('main_image')) {
            $career->clearMediaCollection('main_images');
            $career->addMediaFromRequest('main_image')->toMediaCollection('main_images');
        }
        if ($request->hasFile('inner_image')) {
            $career->clearMediaCollection('inner_images');
            $career->addMediaFromRequest('inner_image')->toMediaCollection('inner_images');
        }

        if ($request->hasFile('inner1_image')) {
            $career->clearMediaCollection('inner1_images');
            $career->addMediaFromRequest('inner1_image')->toMediaCollection('inner1_images');
        }


        $store = $career->save();

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
        $career = CareerHub::findOrFail($id);
        $career->clearMediaCollection('main_images');
        $career->clearMediaCollection('inner_images');
        $career->clearMediaCollection('inner1_images');
        $career->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }


    public function storeTag(Request $request)
    {

        dd($request->all());
        $request->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $tag = CareerTags::updateOrCreate([
                'id' => $request->tag_id
            ], [
                'title' => $request->title,

            ]);

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->tag_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function tagGetData()
    {
        $quote = CareerTags::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function editTag($id)
    {
        $tag = CareerTags::findOrfail($id);
        return $tag;
    }

    public function destroyTag($id)
    {
        $tag = CareerTags::findOrfail($id);
        $tag->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully!'
        ]);
    }
}
