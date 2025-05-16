<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index(){
    $banner = Banner::where('page', 'contact')->first();
    $contact = Contact::first();
   
    return view('website.contact', compact('banner','contact') );
  }
}
