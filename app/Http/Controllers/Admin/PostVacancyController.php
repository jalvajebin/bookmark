<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostVacancyApplication;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PostVacancyController extends Controller
{
    public function index()
    {
        return view('admin.cv.index');
    }

    public function getVacancyApplication(Request $request)
    {

        $quote = PostVacancyApplication::query()->orderBy('id', 'desc');
        // dd($quote);

        if ($request->ajax()) {
            $data = PostVacancyApplication::select('post_vacancy_applications.*');

            return DataTables::of($data)
                // ->addColumn('passport', function ($row) {
                //     return $row->country ?? '-';
                // })
                // ->addColumn('birth_country', function ($row) {
                //     return $row->curriculam ?? '-';
                // })
                ->make(true);
        }
    }


    public function deleteApplication(Request $request)
    {
        $cv  = PostVacancyApplication::whereIn('id', $request->ids)->first();

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
