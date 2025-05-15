<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function index(){
        $destinations = Destination::all();
        return view('website.home', compact('destinations'));
    }
}
