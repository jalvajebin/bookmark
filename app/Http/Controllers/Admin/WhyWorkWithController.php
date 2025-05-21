<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyWorkWith;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WhyWorkWithController extends Controller
{

    public function index(Request $request)
    {

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


    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => $request->why_work_with_us_id ? 'image|max:2048' : 'required|image|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $why = WhyWorkWith::updateOrCreate([
                'id' => $request->why_work_with_us_id
            ], [
                'title' => $request->title,
                'description' => $request->description,

            ]);
            if ($request->hasFile('image')) {
                $why->clearMediaCollection('images');
                $why->addMediaFromRequest('image')->toMediaCollection('images');
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->why_work_with_us_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
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
