<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ApplicationExport;
use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\SubmitCvApplication;
use App\Models\SumbitCvApllication;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SubmitCvController extends Controller
{
    public function index()
    {
        return view('admin.cv.index');
    }

    public function getCvApplication()
    {

        $quote = SubmitCvApplication::query()->orderBy('id', 'desc');
        // dd($quote);

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }


    public function deleteApplication(Request $request)
    {
        $cv  = SubmitCvApplication::whereIn('id', $request->ids)->first();

        if (!isset($cv)) {
            return response()->json(['success' => false, 'message' => "Not found!"]);
        }
        $cv->delete();
        return response()->json(['success' => true, 'message' => "Deleted"]);
    }


    public function applicationExport(Request $request)
    {
        $ids = $request->ids ?? [];
        return Excel::download(new ApplicationExport($ids), 'applications.xlsx');
    }
}
