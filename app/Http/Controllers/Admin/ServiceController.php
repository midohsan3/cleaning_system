<?php

namespace App\Http\Controllers\Admin;

use alert;
use App\Models\ServiceMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserActivityMdl;
use App\Models\ServiceHistoryMdl;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
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
        $services = ServiceMdl::orderBy('id', 'DESC')->paginate(pageCount);
        $servicesCount = $services->count();
        $list_tile = 'All';
        
       return view('admin.service.index', compact('services','servicesCount','list_tile'));
    }
    /**
     * Display a listing of the active resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $services = ServiceMdl::where('status',1)->orderBy('id', 'DESC')->paginate(pageCount);
        $servicesCount = $services->count();
        $list_tile = 'Active';
        
       return view('admin.service.index', compact('services','servicesCount','list_tile'));
    }
    /**
     * Display a listing of the inactive resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive()
    {
        $services = ServiceMdl::where('status',0)->orderBy('id', 'DESC')->paginate(pageCount);
        $servicesCount = $services->count();
        $list_tile = 'Inactive';
        
       return view('admin.service.index', compact('services','servicesCount','list_tile'));
    }
    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $services = ServiceMdl::onlyTrashed()->orderBy('id', 'DESC')->paginate(pageCount);
        $list_tile = 'Trashed';
        
       return view('admin.service.trashed', compact('services','list_tile'));
    }
    /**
     * Display a listing of the activity resource.
     * 
     *@param  int  $service
     * @return \Illuminate\Http\Response
     */
    public function activity(ServiceMdl $service)
    {
        $service::find($service);

        $actions = ServiceHistoryMdl::where('service_id',$service->id)->orderBy('id','DESC')->paginate(pageCount);
        
       return view('admin.service.activity', compact('service','actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'nameEn'=>'required|string|unique:services,name_en',
            'nameAr'=>'nullable|string|unique:services,name_ar',
            'hPrice'=>'nullable|numeric',
            'dPrice'=>'nullable|numeric',
            'mPrice'=>'nullable|numeric',
        ],[
            'nameEn.required'=>'English Name is Required',
            'nameEn.string'=>'Format Not Matching',
            'nameEn.unique'=>'Name Is Already Exists',
            
            'nameAr.string'=>'Format Not Matching',
            'nameAr.unique'=>'Name Is Already Exists',
            
            'hPrice.numeric'=>'Format Not Matching',
            
            'dPrice.numeric'=>'Format Not Matching',
            
            'mPrice.numeric'=>'Format Not Matching',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $service = ServiceMdl::create([
            'name_en'=>Str::title($req->nameEn),
            'name_ar'=>$req->nameAr,
            'm_price' =>$req->mPrice,
            'd_price' =>$req->dPrice,
            'h_price' =>$req->hPrice,
        ]);

        //SERVICE HISTORY
        ServiceHistoryMdl::create([
            'service_id'=>$service->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Added To System By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Add New Service '.$service->name_en,
        ]);

        Toastr()->success('Service Added Successfully.', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $service
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceMdl $service)
    {
        $service::find($service);
        return view('admin.service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceMdl $service)
    {
        $service::find($service);
        
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        
        $valid = Validator::make($req->all(),[
            'serviceId'=>'required|numeric|exists:services,id',
            'nameEn'=>'required|string|unique:services,name_en,'.$req->serviceId,
            'nameAr'=>'nullable|string|unique:services,name_ar,'.$req->serviceId,
            'hPrice'=>'nullable|numeric',
            'dPrice'=>'nullable|numeric',
            'mPrice'=>'nullable|numeric',
        ],[
            'nameEn.required'=>'English Name is Required',
            'nameEn.string'=>'Format Not Matching',
            'nameEn.unique'=>'Name Is Already Exists',
            
            'nameAr.string'=>'Format Not Matching',
            'nameAr.unique'=>'Name Is Already Exists',
            
            'hPrice.numeric'=>'Format Not Matching',
            
            'dPrice.numeric'=>'Format Not Matching',
            
            'mPrice.numeric'=>'Format Not Matching',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }
        
        $service = ServiceMdl::find($req->serviceId);
       
        $service->name_en =Str::title($req->nameEn);
        $service->name_ar =$req->nameAr;
        $service->m_price =$req->mPrice;
        $service->d_price =$req->dPrice;
        $service->h_price =$req->hPrice;
        $service->save();

         //SERVICE HISTORY
         ServiceHistoryMdl::create([
            'service_id'=>$service->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Updated  By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Update Service '.$service->name_en,
        ]);
        Toastr()->success('Service Updated Successfully.', 'Success');
        return back();

        
    }
    /**
     * Activate the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $req)
    {
        
        $valid = Validator::make($req->all(),[
            'serviceID'=>'required|numeric|exists:services,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }
        
        $service = ServiceMdl::find($req->serviceID);
       
        $service->status =1;
        $service->save();

         //SERVICE HISTORY
         ServiceHistoryMdl::create([
            'service_id'=>$service->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Activated  By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Activate Service '.$service->name_en,
        ]);
        Toastr()->success('Service Activated Successfully.', 'Success');
        return back();        
    }
    /**
     * Deactivate the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $req)
    {
        
        $valid = Validator::make($req->all(),[
            'serviceID'=>'required|numeric|exists:services,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }
        
        $service = ServiceMdl::find($req->serviceID);
       
        $service->status =0;
        $service->save();

         //SERVICE HISTORY
         ServiceHistoryMdl::create([
            'service_id'=>$service->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Deactivated  By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Deactivate Service '.$service->name_en,
        ]);

        Toastr()->success('Service Deactivated Successfully.', 'Success');
        return back();        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {        
        $valid = Validator::make($req->all(),[
            'serviceID'=>'required|numeric|exists:services,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }
        
        $service = ServiceMdl::find($req->serviceID);
       
         //SERVICE HISTORY
         ServiceHistoryMdl::create([
            'service_id'=>$service->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Delete  By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Trash Service '.$service->name_en,
        ]);
        $service->delete();

        Toastr()->success('Service Deleted Successfully.', 'Success');
        return back();     
    }
     /**
     * Restore the specified resource.
     *
     * @param  int  $service
     * @return \Illuminate\Http\Response
     */
    public function restore($service)
    {
        $service=ServiceMdl::withTrashed()->find($service);
        
        $service->restore();

         //SERVICE HISTORY
         ServiceHistoryMdl::create([
            'service_id'=>$service->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Restored  By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Restore Service '.$service->name_en,
        ]);

        Toastr()->success('Service Restored Successfully.', 'Success');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ddestroy(Request $req)
    {
         
        $valid = Validator::make($req->all(),[
            'serviceID'=>'required|numeric|exists:services,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }
        
        $service = ServiceMdl::withTrashed()->find($req->serviceID);
       
         //SERVICE HISTORY
         $actions = ServiceHistoryMdl::where('service_id',$service->id)->get();
         foreach($actions as $action){
            $action->forceDelete();
         }
         
        
        //USER ACTIVITY      
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Delete Service '.$service->name_en.' From System' ,
        ]);
        $service->forceDelete();

        Toastr()->success('Service Deleted Successfully.', 'Success');
        return back();     
    }

}