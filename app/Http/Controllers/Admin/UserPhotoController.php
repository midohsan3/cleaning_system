<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\EmployeeMdl;
use Illuminate\Http\Request;
use App\Models\UserActivityMdl;
use App\Models\EmployeeHistoryMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function photo( User $user){

        $user::find($user);

        return view('admin.employee.upload.photo', compact('user'));
    }

    public function photoStore(Request $req){
        $valid = Validator::make($req->all(), [
            'user' => 'required|numeric|exists:users,id',
            'photo'    => 'required|image|mimes:jpeg,png,jpg,gif'
        ], [
            'user.required' =>'This Field Is Required.',
            'user.numeric' => 'Format Not Matching.',
            'user.exists'     => 'This Value Is Not Exists.',

            'photo.required'  =>'Photo Is Required.',
            'photo.image'    => 'Format Not Matching.',
            'photo.mimes'   => 'The file you uploaded is Not Image.',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user=User::find($req->user);

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/users'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STORAGE FILE
            $resize = Image::make("imgs/users/{$imgName}")->resize(500, 500);

            $resize->save("imgs/users/{$imgName}");

            Storage::put("public/imgs/users/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/users/' . $imgName);
            File::delete('storage/app/public/imgs/users/' . $user->photo);
        } else {
            $imgName = $user->photo;
        }

        $user->photo = $imgName;
        $user->save();

        $empolyee = EmployeeMdl::where('user_id',$user->id)->first();

        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$empolyee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Add Personal Photo By '.Auth::user()->name,
        ]);

        //USER ACTIVITY
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Add Personal Photo To Employee '.$user->name,
        ]);

        Toast()->success('Photo Added Successfully','Success');
        return back();
    }

    public function passport(User $user){

        $user::find($user);

        return view('admin.employee.upload.passport', compact('user'));
    }

    public function passportStore(Request $req){
        $valid = Validator::make($req->all(), [
            'user' => 'required|numeric|exists:users,id',
            'photo'    => 'required|image|mimes:jpeg,png,jpg,gif'
        ], [
            'user.required' =>'This Field Is Required.',
            'user.numeric' => 'Format Not Matching.',
            'user.exists'     => 'This Value Is Not Exists.',

            'photo.required'  =>'Photo Is Required.',
            'photo.image'    => 'Format Not Matching.',
            'photo.mimes'   => 'The file you uploaded is Not Image.',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user=User::find($req->user);

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/users'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STORAGE FILE
            $resize = Image::make("imgs/users/{$imgName}")->resize(600, 350);

            $resize->save("imgs/users/{$imgName}");

            Storage::put("public/imgs/users/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/users/' . $imgName);
            File::delete('storage/app/public/imgs/users/' . $user->passport_copy);
        } else {
            $imgName = $user->passport_copy;
        }

        $user->passport_copy = $imgName;
        $user->save();

        $empolyee = EmployeeMdl::where('user_id',$user->id)->first();

        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$empolyee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Add Passport Photo By '.Auth::user()->name,
        ]);

        //USER ACTIVITY
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Add Passport Photo To Employee '.$user->name,
        ]);

        Toast()->success('Photo Added Successfully','Success');
        return back();
    }

    public function em(User $user){

        $user::find($user);

        return view('admin.employee.upload.em', compact('user'));
    }

    public function emStore(Request $req){
        $valid = Validator::make($req->all(), [
            'user' => 'required|numeric|exists:users,id',
            'photo'    => 'required|image|mimes:jpeg,png,jpg,gif'
        ], [
            'user.required' =>'This Field Is Required.',
            'user.numeric' => 'Format Not Matching.',
            'user.exists'     => 'This Value Is Not Exists.',

            'photo.required'  =>'Photo Is Required.',
            'photo.image'    => 'Format Not Matching.',
            'photo.mimes'   => 'The file you uploaded is Not Image.',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user=User::find($req->user);

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/users'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STORAGE FILE
            $resize = Image::make("imgs/users/{$imgName}")->resize(300, 550);

            $resize->save("imgs/users/{$imgName}");

            Storage::put("public/imgs/users/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/users/' . $imgName);
            File::delete('storage/app/public/imgs/users/' . $user->em_copy);
        } else {
            $imgName = $user->em_copy;
        }

        $user->em_copy = $imgName;
        $user->save();

        $empolyee = EmployeeMdl::where('user_id',$user->id)->first();

        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$empolyee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Add ID Photo By '.Auth::user()->name,
        ]);

        //USER ACTIVITY
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Add ID Photo To Employee '.$user->name,
        ]);

        Toast()->success('Photo Added Successfully','Success');
        return back();
    }
}