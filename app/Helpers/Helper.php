<?php

use App\Models\Category;
use App\Models\Contact;
use App\Models\Permission;
use App\Models\Seo;
use App\Models\Social;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


if (!function_exists('userImage')) {

    function userImage()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $imagePath =  asset("avatar.jpeg");
        if (isset($user->image) && !empty($user->image)) {
            $imagePath = env('APP_URL') . Storage::url($user->image);
        }
        return $imagePath;
    }
}

if (!function_exists('contact')) {
    function contact()
    {
        return  Contact::latest()->first();
    }
}

if (!function_exists('socialmedia')) {
    function socialmedia()
    {
        return  Social::latest()->first();
    }
}

if (!function_exists('categoryList')) {

    function categoryList()
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->with('subCategory')->get();
        return $category;
    }
}
