<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function update(Request $request, $id)
    {
        $message = "You Have Made No Changes To Save";
        $status = false;
        
        $seo = Seo::findOrFail($id);
        // $seo->page = $request->input('page');
        $seo->meta_title = $request->input('meta_title');
        $seo->meta_keyword = $request->input('meta_keyword');
        $seo->meta_description = $request->input('meta_description');
        $seo->save();
        if ($seo->wasChanged()) {
            $message = "You Have Successfully Updated";
            $status = true;
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }
}
