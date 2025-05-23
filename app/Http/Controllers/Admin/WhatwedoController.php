<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatWeDo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'what_image' => $request->what_we_do_id ? 'image|max:2048' : 'required|image|max:2048',
            'title_one' => 'nullable|string|max:255',
            'para_one' => 'nullable|string',
            'title_two' => 'nullable|string|max:255',
            'para_two' => 'nullable|string',
            'title_three' => 'nullable|string|max:255',
            'para_three' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $what = WhatWeDo::updateOrCreate([
                'id' => $request->what_we_do_id
            ], [

                'title' => $request->title,
                'description' => $request->description,
                'title_one' => $request->title_one,
                'para_one' => $request->para_one,
                'title_two' => $request->title_two,
                'para_two' =>  $request->para_two,
                'title_three' => $request->title_three,
                'para_three' => $request->para_three,

            ]);
            if ($request->hasFile('what_image')) {
                $what->clearMediaCollection('what_images');
                $what->addMediaFromRequest('what_image')->toMediaCollection('what_images');
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->what_we_do_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }


    }
}
