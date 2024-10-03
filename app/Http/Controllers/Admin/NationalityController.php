<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\NationalityMdl;
use App\Models\UserActivityMdl;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\NationalityHistoryMdl;
use Illuminate\Support\Facades\Validator;

class NationalityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities = NationalityMdl::orderBy('name_en','ASC')->paginate(pageCount);

        $nationalitiesCount = $nationalities->count();

        $list_tile = 'All';
        
        return view('admin.nationality.index', compact('nationalities', 'nationalitiesCount', 'list_tile'));
    }
    
    /**
     * Display a listing of the Active resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $nationalities = NationalityMdl::where('status',1)->orderBy('name_en','ASC')->paginate(pageCount);

        $nationalitiesCount = $nationalities->count();

        $list_tile = 'Active';
        
        return view('admin.nationality.index', compact('nationalities', 'nationalitiesCount', 'list_tile'));
    }
    /**
     * Display a listing of the Inactive resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive()
    {
        $nationalities = NationalityMdl::where('status',0)->orderBy('name_en','ASC')->paginate(pageCount);

        $nationalitiesCount = $nationalities->count();

        $list_tile = 'Inactive';
        
        return view('admin.nationality.index', compact('nationalities', 'nationalitiesCount', 'list_tile'));
    }
    
    /**
     * Display a listing of the Trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $nationalities = NationalityMdl::onlyTrashed()->orderBy('name_en','ASC')->paginate(pageCount);
        
        $list_tile = 'Trashed';
        
        return view('admin.nationality.trashed', compact('nationalities', 'list_tile'));
    }

    /**
     * Display a listing of the Inactive resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activity(NationalityMdl $nationality)
    {
        $nationality::find($nationality);
        
        $actions = NationalityHistoryMdl::where('nationality_id',$nationality->id)->orderBy('id','DESC')->paginate(pageCount);
        
       return view('admin.nationality.activity', compact('nationality','actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nationality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'nameEn'=>'required|string|unique:nationalities,name_en',
            'nameAr'=>'nullable|string|unique:nationalities,name_ar',
        ],[
            'nameEn.required'=>'Nationality English Name Is Required.',
            'nameEn.string'    =>'Format Not Matching.',
            'nameEn.unique'  =>'This Nationality Already Exists.',
           
            'nameAr.string'    =>'Format Not Matching.',
            'nameAr.unique'  =>'This Nationality Already Exists.',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all()); 
        }

        $nationality=NationalityMdl::create([
            'name_en'=>$req->nameEn,
            'name_ar'=>$req->nameAr,
        ]);

        //NATIONALITY HISTORY
        NationalityHistoryMdl::create([
            'nationality_id'=>$nationality->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Added To System By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Add New Nationality '.$nationality->name_en,
        ]);

        Toastr()->success('Nationality Added Successfully.', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show(NationalityMdl $nationality)
    {
        $nationality::find($nationality);

        return view('admin.nationality.show', compact('nationality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit(NationalityMdl $nationality)
    {
         $nationality::find($nationality);

        return view('admin.nationality.edit', compact('nationality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'nationality'=>'required|numeric|exists:nationalities,id',
            'nameEn'=>'required|string|unique:nationalities,name_en,'.$req->nationality,
            'nameAr'=>'nullable|string|unique:nationalities,name_ar,'.$req->nationality,
        ],[
            'nameEn.required'=>'Nationality English Name Is Required.',
            'nameEn.string'    =>'Format Not Matching.',
            'nameEn.unique'  =>'This Nationality Already Exists.',
           
            'nameAr.string'    =>'Format Not Matching.',
            'nameAr.unique'  =>'This Nationality Already Exists.',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all()); 
        }

        $nationality=NationalityMdl::find($req->nationality);

        $nationality->name_en = $req->nameEn;
        $nationality->name_ar = $req->nameAr;
        $nationality->save();

        //NATIONALITY HISTORY
        NationalityHistoryMdl::create([
            'nationality_id'=>$nationality->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Updated On System By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Update Nationality '.$nationality->name_en,
        ]);

        Toastr()->success('Nationality Updated Successfully.', 'Success');
        return back();
    }
    /**
     * Activate the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'nationalityID'=>'required|numeric|exists:nationalities,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }

        $nationality=NationalityMdl::find($req->nationalityID);

        $nationality->status = 1;
        $nationality->save();

        //NATIONALITY HISTORY
        NationalityHistoryMdl::create([
            'nationality_id'=>$nationality->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Nationality Activated By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Activate Nationality '.$nationality->name_en,
        ]);

        Toastr()->success('Nationality Activated Successfully.', 'Success');
        return back();
    }
    /**
     * Deactivate the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'nationalityID'=>'required|numeric|exists:nationalities,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }

        $nationality=NationalityMdl::find($req->nationalityID);

        $nationality->status = 0;
        $nationality->save();

        //NATIONALITY HISTORY
        NationalityHistoryMdl::create([
            'nationality_id'=>$nationality->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Nationality Deactivated By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Deactivate Nationality '.$nationality->name_en,
        ]);

        Toastr()->success('Nationality Deactivated Successfully.', 'Success');
        return back();
    }
    /**
     * Trash the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'nationalityID'=>'required|numeric|exists:nationalities,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }

        $nationality=NationalityMdl::find($req->nationalityID);
       
        //NATIONALITY HISTORY
        NationalityHistoryMdl::create([
            'nationality_id'=>$nationality->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Nationality Trashed By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Trash Nationality '.$nationality->name_en,
        ]);
        
        $nationality->delete();

        Toastr()->success('Nationality Trashed Successfully.', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $nationality
     * @return \Illuminate\Http\Response
     */
    public function restore($nationality)
    {
        $nationality=NationalityMdl::withTrashed()->find($nationality);

        $nationality->restore();

        //NATIONALITY HISTORY
        NationalityHistoryMdl::create([
            'nationality_id'=>$nationality->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Nationality Restored By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Restore Nationality '.$nationality->name_en,
        ]);

        Toastr()->success('Nationality Restored Successfully.', 'Success');
        return back();
    }
    /**
     * Remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function ddestroy(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'nationalityID'=>'required|numeric|exists:nationalities,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }

        $nationality=NationalityMdl::withTrashed()->find($req->nationalityID);
       
        //NATIONALITY HISTORY
        $actions = NationalityHistoryMdl::where('nationality_id',$nationality->id)->get();
        
        foreach($actions as $action){
            $action->forceDelete();
        }
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Delete Nationality From System'.$nationality->name_en,
        ]);
        
        $nationality->forceDelete();

        Toastr()->success('Nationality Trashed Successfully.', 'Success');
        return back();
    }

}