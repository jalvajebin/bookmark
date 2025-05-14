<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{

    public function index()
    {
        $logedUserData = auth()->user();
        $banner = Banner::where('page', 'destination')->first();

        // $destination = Destination::first();

        return view('admin.destinatin.index', compact('logedUserData', 'banner'));
    }

    public function updateDestination(Request $request)
    {

        dd($request->all());

        $request->validate([
            'title' => 'required',
            'title_two' => 'required',
            'description_one' => 'required',
            'description_two' => 'required',
            'destination_alt_one' => 'required',
            'destination_alt_two' => 'required',
            'destination_alt_three' => 'required',
            'destination_alt_four' => 'required',
            'destination_alt_five' => 'required',
            'destination_alt_six' => 'required',
            'destination_image' => $request->destination_id ? 'image|max:2048' : 'required|image|max:2048',

        ]);

        DB::beginTransaction();
        try {
            $destination = Destination::updateOrCreate([
                'id' => $request->destination_id
            ], [
                'title' => $request->title,
                'title_two' => $request->title_two,
                'description_one' => $request->description_one,
                'description_two' => $request->description_two,


                'alt_one' => $request->alt_one,

                'alt_two' => $request->alt_two,
                'alt_three' => $request->alt_three,

                'alt_four' => $request->alt_four,
                'alt_five' => $request->alt_five,
                'alt_six' => $request->alt_six,




            ]);

            $imageFields = [
                'destination_image',
                'destination_image_two',
                'destination_image_three',
                'destination_image_four',
                'destination_image_five',
                'destination_image_six',
            ];

            $destination->clearMediaCollection('images');

            // Loop through each image field
            foreach ($imageFields as $field) {
                if ($request->hasFile($field)) {
                    $destination->addMediaFromRequest($field)->toMediaCollection('images');
                }
            }
            // if ($request->hasFile('destination_image')) {
            //     $banner->clearMediaCollection('images');
            //     $banner->addMediaFromRequest('destination_image')->toMediaCollection('images');
            // }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->destination_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
