<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ChangePasswordRequest;
use App\Models\Country;
use App\Models\State;
use App\Models\TermAndCondition;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function __construct()
    {

        if (Auth::check()) {
            return Redirect::to('dashboard')->send();
        }
    }

    public function showLoginForm()
    {

        if (Auth::check()) {

            return Redirect::to('dashboard')->send();
        } else {
            return view('/');
        }
    }

    public function login(Request $request)
    {

      
        $this->validate($request, [
            'username' => 'required|email',
            'password' => 'required',
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        $credentials = $request->only('username', 'password');
        if ((Auth::attempt(["email" => $request->username, "password" => $request->password, 'is_admin' => 1], $remember_me))) {

            if (Auth::user()->is_admin == 1) {
                return response()->json(["status" => true, "redirect_location" => url("/dashboard")]);
            }
        } else {
            // return redirect()->back()->with('message', 'Invalid credentials! Please Enter valid Password');
            return response()->json([
                'status' => true,
                'message' => 'Username or password incorrect'
            ], 500);
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function profileChange(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $imagePath = "assets/images/users/placeholder.jpg";
        if (isset($user->image) && !empty($user->image)) {
            $imagePath = env('APP_URL') . Storage::url($user->image);
        }
        return view('admin.profile.index', compact('imagePath', 'user'));
    }
    
    public function profileUpdate(Request $request)
    {
        // $this->validate($request, [
        //      'image' => 'required',
        //    ]);
        $message = "You Have Made No Changes To Save";
        $status = false;

        $user = User::find(Auth::user()->id);

        if ($request->hasFile('image')) {
            Storage::delete($user->image);
            $path = $request->file('image')->store('public/profile');
            $user->image = $path;
        }
        // if ($request->hasFile('image')) {
        //     $destination = 'admin/profilepic/' . $user->image;
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('admin/profilepic/', $filename);
        //     $user->image = $filename;
        // }
        $user->save();
        if ($user->wasChanged()) {
            $message = "You Have Successfully Updated";
            $status = true;
        }


        return response()->json([
            'status' => $status,
            'message' => $message,

        ]);
    }

    public function profileDataUpdate(Request $request)
    {
        $this->validate($request, [
             'name' => 'required|max:50',
             'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:16',
             'email' => 'required|email:rfc,dns',
             'country' => 'required',
           ]);

        $message = "You Have Made No Changes To Save";
        $status = false;

        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->country_id = $request->input('country');
        $user->save();
        if ($user->wasChanged()) {
            $message = "You Have Successfully Updated";
            $status = true;
        }


        return response()->json([
            'status' => $status,
            'message' => $message,

        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        //    dd($request->all());
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {

            // The passwords mismatches
            return response()->json([
                "status" => false,
                "message" => 'Old password incorrect',
            ]);
        } else {

            // Change Password
            $user = User::where('id', Auth::user()->id)->first();
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return response()->json([
                "status" => true,
                "message" => 'The password has been changed successfully',
            ]);
        }
    }

}
