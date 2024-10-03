<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class profileController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    /*
    ===========================
    ===========================
    */
    public function index(){
        return view('admin.profile.index');
    }
    /*
    ===========================
    ===========================
    */
    public function changePassword(){
       return view('admin.profile.changePassword');
    }
    /*
    ===========================
    ===========================
    */
    public function update(Request $req){
       $valid = Validator::make($req->all(), [
       'name' => 'required|string',
       'phone' => 'required|numeric',
       'profilePic' => 'nullable|image|mimes:jpeg,png,jpg,gif',
       ], [
       'name.required' => 'Name is Required.',
       'name.string' => 'Format is Not Matching.',

       'phone.required' => 'Name is Required.',
       'phone.numeric' => 'Format is Not Matching.',

       'profilePic.image' => 'File You Upload is Not Image.',
       'profilePic.mimes' => 'Image Type Not Allowed.',
       ]);

       if ($valid->fails()) {
       return back()->withErrors($valid)->withInput($req->all());
       }

       if ($req->hasFile('profilePic')) {
       $img = $req->file('profilePic');
       $imgName = rand() . '.' . $img->getClientOriginalExtension();
       //save file like a temp
       $img->move(('imgs/users'), $imgName);
       //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STORAGE FILE
       $resize = Image::make('imgs/users/' . $imgName)->resize(600, 600)->encode('jpg');
       Storage::put("public/imgs/users/{$imgName}", $resize->__toString());
       //delete the file as a temp
       File::delete('imgs/users/' . $imgName);
       File::delete('public/imgs/users/' . $req->oldProfile);
       } else {
       $imgName = $req->oldProfile;
       }

       $user = User::find(Auth::user()->id);
       $user->name = $req->name;
       $user->phone = $req->phone;
       $user->photo = $imgName;
       $user->save();

       Toastr()->success('You Update Your Profile Successfully.');
       return back();
    }
    /*
    ===========================
    ===========================
    */
    public function passwordUpdate(Request $req){
        $valid = Validator::make($req->all(), [
        'oldPassword' => 'required',
        'password' => 'required|confirmed|min:8',
        ], [
        'oldPassword.required' => 'Old Password Is Required.',

        'password.required' => 'New Password Is Required.',
        'password.confirmed' => 'Format Not Matching.',
        'password.min' => 'Password Should be Min 8 Chars.',
        ]);

        if ($valid->fails()) {
        return back()->withErrors($valid)->withInput($req->all());
        }

        if (Hash::check($req->oldPassword, Auth::user()->password)) {
        $profile = User::find(Auth::user()->id);
        $profile->password = Hash::make($req->password);
        $profile->save();

        Toastr()->success('Password Changed Successfully.');
        return back();
        } else {
        Toastr()->error('Old Password is Not Matching.');
        return back();
        }
    }
    /*
    ===========================
    ===========================
    */
}
