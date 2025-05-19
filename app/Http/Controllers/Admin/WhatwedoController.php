<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatWeDo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\Validator;



class WhatwedoController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = WhatWeDo::latest()->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('editwhywork', $row->id);
                    $deleteUrl = route('destroywhywork', $row->id);

                    return '
                        <a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '">Delete</button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.whatwedo.index');
    }


    public function create(Request $request)
    {

        return view('admin.whatwedo.create');
    }


    public function store(Request $request)
    {
        // Basic validation rules
        $rules = [
            'type' => 'required|in:whatwedo,easystep',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];

        // Additional rules for easystep
        if ($request->type === 'easystep') {
            $rules = array_merge($rules, [
                'title_one' => 'nullable|string|max:255',
                'para_one' => 'nullable|string',
                'title_two' => 'nullable|string|max:255',
                'para_two' => 'nullable|string',
                'title_three' => 'nullable|string|max:255',
                'para_three' => 'nullable|string',
            ]);
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => 'Validation Failed',
                'message' => 'Please correct the errors and try again.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Save the data
        $data = new WhatWeDo();
        $data->type = $request->type;
        $data->title = $request->title;
        $data->description = strip_tags($request->description);

        if ($request->type === 'easystep') {
            $data->title_one = $request->title_one;
            $data->para_one = $request->para_one;
            $data->title_two = $request->title_two;
            $data->para_two = $request->para_two;
            $data->title_three = $request->title_three;
            $data->para_three = $request->para_three;
        }

        $data->save();

        // Handle image upload using Spatie Media Library
        if ($request->hasFile('icon')) {
            $data->addMediaFromRequest('icon')->toMediaCollection('what_we_do');
        }

        return response()->json([
            'icon' => 'success',
            'title' => 'Saved Successfully',
            'message' => 'Your entry has been saved.'
        ]);
    }
}
