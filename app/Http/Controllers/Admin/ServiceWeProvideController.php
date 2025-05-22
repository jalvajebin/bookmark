<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceWeProvide;
use Illuminate\Support\Facades\Validator;

use Yajra\DataTables\Facades\DataTables;






class ServiceWeProvideController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ServiceWeProvide::latest()->get();


            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('action', function ($row) {
                //     $editUrl = route('editServicePro', $row->id);
                //     $deleteUrl = route('destroyServicePro', $row->id);

                //     return '
                //         <a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                //         <button class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '">Delete</button>
                //     ';
                // })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.services.index');
    }



    public function create()
    {

        return view('admin.serviceWeProvide.create');
    }

    public function storeAjax(Request $request)
    {

        // Validate input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create the record
        $service = new ServiceWeProvide();
        $service->title = $request->title;
        $service->status = 1;
        $service->description = $request->description;

        $service->save();

        // Save icon using Spatie Media Library
        if ($request->hasFile('icon')) {
            $service->addMediaFromRequest('icon')->toMediaCollection('icon');
        }

        if ($request->hasFile('image')) {
            $service->addMediaFromRequest('image')->toMediaCollection('images');
        }


        return response()->json([
            'icon' => 'success',
            'title' => 'Success!',
            'message' => 'Service We Provide created successfully.',
        ]);
    }

    public function changeStatus(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $service = ServiceWeProvide::findOrFail($id);

        if ($service->status == 1) {
            $service->status = 0;
        } else {
            $service->status = 1;
        }
        $service->save();
        return response()->json([
            'status' => 'Successfully Changed Status'
        ]);
    }

    public function edit($id)
    {

        $service = ServiceWeProvide::findOrFail($id);

        return view('admin.serviceWeProvide.edit', compact('service'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $service = ServiceWeProvide::findOrFail($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        if ($request->hasFile('icon')) {
            $service->clearMediaCollection('icon');
            $service->addMediaFromRequest('icon')->toMediaCollection('icon');
        }

        if ($request->hasFile('image')) {
            $service->clearMediaCollection('images');
            $service->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return response()->json([
            'icon' => 'success',
            'title' => 'Updated!',
            'message' => 'Service We Provide updated successfully.'
        ]);
    }
    public function destroy($id)
    {
        $service = ServiceWeProvide::findOrFail($id);

        // Optionally delete associated media
        $service->clearMediaCollection('icon');

        $service->delete();

        return response()->json(['message' => 'Service deleted successfully.']);
    }
}
