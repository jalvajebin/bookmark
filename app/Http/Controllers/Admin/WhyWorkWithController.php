<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyWorkWith;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class WhyWorkWithController extends Controller
{

    public function index(Request $request) {

         if ($request->ajax()) {
            $data = WhyWorkWith::latest()->get();


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

        return view('admin.why.index');




    }
    public function create(Request $request)
    {
        return view('admin.why.create');
    }


   public function storeAjax(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    $why = new WhyWorkWith();

    $why->title = trim($request->title);
    $why->description = strip_tags($request->description);
    $why->save();
    //$why = WhyWorkWith::create([
       // 'title' => $request->title,
     //   'description' => strip_tags($request->description),
    //]);

    if ($request->hasFile('icon')) {
        $why->addMediaFromRequest('icon')->toMediaCollection('image1_name');
    }

    return response()->json([
        'icon' => 'success',
        'title' => 'Success',
        'message' => 'Entry added successfully',
    ]);
}

    public function edit($id)
    {
        $whyWorkWith = WhyWorkWith::findOrFail($id);
        return view('admin.why.edit', compact('whyWorkWith'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $item = WhyWorkWith::findOrFail($id);

     $item->title = trim($request->title);
    $item->description = strip_tags($request->description);
    $item->save();

    //$item->update([
    //    'title' => $request->title,
     //   'description' => $request->description, // or use strip_tags() based on your needs
   // ]);

    if ($request->hasFile('icon')) {
        $item->clearMediaCollection('image1_name');
        $item->addMediaFromRequest('icon')->toMediaCollection('image1_name');
    }

    return response()->json([
        'icon' => 'success',
        'title' => 'Updated',
        'message' => 'Entry updated successfully!'
    ]);
}

public function destroy($id)
{
    $why = WhyWorkWith::findOrFail($id);
    
    // Optionally delete associated media
    $why->clearMediaCollection('image1_name');

    $why->delete();

    return response()->json(['message' => 'Service deleted successfully.']);
}

}
