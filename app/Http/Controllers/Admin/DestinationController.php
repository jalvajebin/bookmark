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
        // dd($quote);
        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function edit(Request $request)
    {
        return view('admin.destination.edit');
    }
}
