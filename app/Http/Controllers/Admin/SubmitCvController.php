<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\SubmitCvApplication;
use App\Models\SumbitCvApllication;
use Illuminate\Http\Request;
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

}
