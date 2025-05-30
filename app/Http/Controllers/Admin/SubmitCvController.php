<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ApplicationExport;
use App\Exports\VacancyExport;
use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\PostVacancyApplication;
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

    public function getCvApplication(Request $request)
    {

        $quote = SubmitCvApplication::query()->orderBy('id', 'desc');
        // dd($quote);

        if ($request->ajax()) {
            $data = SubmitCvApplication::with([
                'passportDestination',
                'birthCountryDestination',
                'currentCountryDestination'
            ])->select('submit_cv_applications.*');

            return DataTables::of($data)
                ->addColumn('passport', function ($row) {
                    return $row->passportDestination->name ?? $row->passport;
                })
                ->addColumn('birth_country', function ($row) {
                    return $row->birthCountryDestination->name ?? $row->birth_country;
                })
                ->addColumn('current_country', function ($row) {
                    return $row->currentCountryDestination->name ?? $row->current_country;
                })
                ->make(true);
        }
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

     public function deleteVacancyApplication(Request $request)
    {
        $vacancy  = PostVacancyApplication::whereIn('id', $request->ids)->first();

        if (!isset($cv)) {
            return response()->json(['success' => false, 'message' => "Not found!"]);
        }
        $vacancy->delete();
        return response()->json(['success' => true, 'message' => "Deleted"]);
    }


    public function applicationExport(Request $request)
    {
        $ids = $request->ids ?? [];
        return Excel::download(new ApplicationExport($ids), 'applications.xlsx');
    }

   
}
