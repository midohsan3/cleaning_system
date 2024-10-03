<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\LeaveMdl;
use App\Models\EmployeeMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UserActivityMdl;
use App\Models\CleanerScheduleMdl;
use App\Models\EmployeeHistoryMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
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
        $leaves = LeaveMdl::orderBy('id','DESC')->paginate(pageCount);
        $leavesCount = $leaves->count();
        $list_tile = 'All ';
        return view('admin.leave.index', compact('leaves','leavesCount','list_tile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $users = User::whereNotIn('role_name',['Owner','Customer'])->orderBy('name','ASC')->get();
        return view('admin.leave.create',compact('users'));
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
            'nameEn' =>'required|numeric|exists:users,id',
            'type'         =>'required|numeric',
            'startDate' =>'required|string',
            'endDate' =>'required|string',
            'description' =>'nullable|string',
        ],[
            'nameEn.required'=>'Employee Name Is Required.',
            'nameEn.numeric'=>'Format Not Matching.',
            'nameEn.exists'=>'This Name Is Not In The Team.',
           
            'type.required'=>'Leave Type Is Required.',
            'type.numeric'=>'Format Not Matching.',
           
            'startDate.required'=>'Start Date  Is Required.',
            'startDate.string'=>'Format Not Matching.',
           
            'endDate.required'=>'End Date Is Required.',
            'endDate.string'=>'Format Not Matching.',
            
            'description.string'=>'Format Not Matching.',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $startDate = Carbon::createFromFormat('d/m/Y', $req->startDate)->format('Y-m-d');

        if($req->startTime !==null){ 
            $startTime =date('H:i:s',strtotime($req->startTime));
            //$startTime = Carbon::createFromFormat('H:i A', )->format('H:i:s');
        }else{
            
            $startTime = Carbon::createFromFormat('H:i:s', '00:00:00')->format('H:i:s');
        }
        
        $endDate = Carbon::createFromFormat('d/m/Y', $req->endDate)->format('Y-m-d');

        if($req->endTime !==null){
             $endTime = $startTime =date('H:i:s',strtotime($req->endTime));;
             //$endTime = Carbon::createFromFormat('H:i A', '$req->endTime')->format('H:i:s');
        }else{            
            $endTime = Carbon::createFromFormat('H:i:s', '23:59:59')->format('H:i:s');
        }
        
        $leave = LeaveMdl::create([
            'user_id'=>$req->nameEn,
            'type'=>$req->type,
            'start_at'=>$startDate.' '.$startTime,
            'end_at'=>$endDate.' '.$endTime,
            'details'=>$req->description,
        ]);

        $employee = EmployeeMdl::where('user_id',$req->nameEn)->first();

        //CLEANER SCHEDULE 
        if($employee->position = 'Cleaner'){
            CleanerScheduleMdl::create([
                'user_id'=>$employee->user_id,
                'start_job'=>date('Y-m-d H:i:s',strtotime($leave->start_at)),
                'end_job'=>date('Y-m-d H:i:s',strtotime($leave->end_at)),
                'type'=>$leave->type,
                'leave_id'=>$leave->id,
                'description'=>$leave->details,
            ]);
        }

        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Submit Leave By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Submit Leave To Employee Code MJ-'.$employee->code,
        ]);

        Toastr()->success('Permission Added Succuessfully','Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveMdl $leave)
    {
        $leave::find($leave);
        return view('admin.leave.edit', compact('leave'));
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
            'leave'=>'required|numeric|exists:leaves,id',
            'type'         =>'required|numeric',
            'startDate' =>'required|string',
            'endDate' =>'required|string',
            'description' =>'nullable|string',
        ],[
            'leave.required'=>'Employee Name Is Required.',
            'leave.numeric'=>'Format Not Matching.',
            'leave.exists'=>'This Name Is Not In The Team.',
           
            'type.required'=>'Leave Type Is Required.',
            'type.numeric'=>'Format Not Matching.',
           
            'startDate.required'=>'Start Date  Is Required.',
            'startDate.string'=>'Format Not Matching.',
           
            'endDate.required'=>'End Date Is Required.',
            'endDate.string'=>'Format Not Matching.',
            
            'description.string'=>'Format Not Matching.',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $startDate = Carbon::createFromFormat('d/m/Y', $req->startDate)->format('Y-m-d');

        if($req->startTime !==null){ 
            $startTime = Carbon::createFromFormat('h:i A', $req->startTime)->format('H:i:s');
        }else{
            
            $startTime = Carbon::createFromFormat('H:i:s', '00:00:00')->format('H:i:s');
        }
        
        $endDate = Carbon::createFromFormat('d/m/Y', $req->endDate)->format('Y-m-d');

        if($req->endTime !==null){
             $endTime = Carbon::createFromFormat('h:i A', $req->endTime)->format('H:i:s');
        }else{            
            $endTime = Carbon::createFromFormat('H:i:s', '23:59:59')->format('H:i:s');
        }

        $leave = LeaveMdl::find($req->leave);

        $leave->type = $req->type;
        $leave->start_at = $startDate.' '.$startTime;
        $leave->end_at = $endDate.' '.$endTime;
        $leave->details = $req->description;
        $leave->save();

        $employee = EmployeeMdl::where('user_id',$leave->user_id)->first();

        //CLEANER SCHEDULE 
        if($employee->position = 'Cleaner'){
             $schedule = CleanerScheduleMdl::where('leave_id',$leave->id)->first();

            $schedule->start_job = date('Y-m-d H:i:s',strtotime($leave->start_at));
            $schedule->end_job = date('Y-m-d H:i:s',strtotime($leave->end_at));
            $schedule->type =$leave->type;
            $schedule->description =$leave->details;
            $schedule->save();
        }

        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Update Leave By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Update Leave To Employee Code MJ-'.$employee->code,
        ]);

        Toastr()->success('Permission Updated Succuessfully','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'leaveID'=>'required|numeric|exists:leaves,id'
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later', 'Error');
        }

        $leave  = LeaveMdl::find($req->leaveID);

        $employee = EmployeeMdl::where('user_id',$leave->user_id)->first();

        //CLEANER SCHEDULE 
        if($employee->position = 'Cleaner'){
             $schedule = CleanerScheduleMdl::where('leave_id',$leave->id)->first();

            $schedule->delete();
        }

        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Delete Leave By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Delete Leave To Employee Code MJ-'.$employee->code,
        ]);

        $leave->delete();

        Toastr()->success('Leave Deleted Successfully,', 'Success');
        return back();
    }
}