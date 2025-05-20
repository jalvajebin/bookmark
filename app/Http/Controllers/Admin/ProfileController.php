<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profileChange(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        // $country = Country::orderBy('country_name', 'ASC')->where('status', 1)->get();
        // $roles = Role::orderBy('name', 'DESC')->where('id', '!=', 1)->get();
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
            if(isset($user->image))
            {
                Storage::delete($user->image);
            }
            $path = $request->file('image')->store('public/profile');
            $user->image = $path;
        }
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
        $request->validate([
            'name' => 'required|max:50',
            // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:16',
            'email' => 'required|email:rfc,dns',
            // 'country' => 'required',
        ]);

        $message = "You Have Made No Changes To Save";
        $status = false;

        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // $user->phone = $request->input('phone');
        // $user->country_id = $request->input('country');
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
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return response()->json(["status" => false, "message" => 'Old password incorrect',]);
        }
        // Change Password
        $user = User::where('id', Auth::user()->id)->first();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return response()->json(["status" => true, "message" => 'The password has been changed successfully']);
    }
}
