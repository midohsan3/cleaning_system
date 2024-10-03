<?php

namespace App\Http\Controllers\Admin;

use App\Models\LeaveMdl;
use App\Models\BookingMdl;
use App\Models\CustomerMdl;
use App\Models\EmployeeMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UserActivityMdl;
use App\Models\UserHasBookingMdl;
use App\Models\CleanerScheduleMdl;
use App\Models\EmployeeHistoryMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HireController extends Controller
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
        $bookings = BookingMdl::where('type',1)->orderBy('id','DESC')->paginate(pageCount);
        
        $bookingsCount = $bookings->count();

        $list_tile = 'All';
        return view('admin.hiring.index', compact('bookings','bookingsCount','list_tile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'customer' =>'required|numeric|exists:users,id',
            'nameEn' =>'required|numeric|exists:users,id',
            'type'         =>'required|numeric',
            'startDate' =>'required|string',
            'endDate' =>'required|string',
            'description' =>'nullable|string',
        ],[
            'customer.required'=>'Customer Name Is Required.',
            'customer.numeric'=>'Format Not Matching.',
            'customer.exists'=>'This Name Is Not In The Team.',
           
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
            
            $startTime = Carbon::createFromFormat('H:i:s', '09:00:00')->format('H:i:s');
        }
        
        $endDate = Carbon::createFromFormat('d/m/Y', $req->endDate)->format('Y-m-d');

        if($req->endTime !==null){
             $endTime =date('H:i:s',strtotime($req->endTime));
             //$endTime = Carbon::createFromFormat('H:i A', '$req->endTime')->format('H:i:s');
        }else{            
            $endTime = Carbon::createFromFormat('H:i:s', '23:59:59')->format('H:i:s');
        }

        $employee = EmployeeMdl::where('user_id',$req->nameEn)->first();

        $schedule = CleanerScheduleMdl::where('start_job','<=',Carbon::parse($startDate.' '.$startTime))->where('end_job','>=',Carbon::parse($endDate.' '.$endTime))->where('user_id',$employee->user_id)->count();

        //CLEANER SCHEDULE 
        if($schedule==0){
            $customer = CustomerMdl::where('user_id',$req->customer)->first();
        
            $booking = BookingMdl::create([
                'user_id'=>$customer->user_id,
                'ref_no'=>'JM'.date('YmdHis',strtotime(now())),
                'address'=>$customer->address,
                'cleaners_count'=>1,
                'start_date'=>Carbon::parse($startDate.' '.$startTime),
                'end_date'=>Carbon::parse($endDate.' '.$endTime),
                'total'=>$req->cost,
                'status'=>2,
                'type'=>1,
            ]);

            $booking->usersHasBookings()->sync($employee->user_id);
            
            $leave = LeaveMdl::create([
                'user_id'=>$req->nameEn,
                'type'=>$req->type,
                'start_at'=>$startDate.' '.$startTime,
                'end_at'=>$endDate.' '.$endTime,
                'details'=>$req->description,
                'booking_id'=>$booking->id,
            ]);
            
                CleanerScheduleMdl::create([
                    'user_id'=>$employee->user_id,
                    'start_job'=>Carbon::parse($startDate.' '.$startTime),
                    'end_job'=>Carbon::parse($endDate.' '.$endTime),
                    'type'=>$leave->type,
                    'leave_id'=>$leave->id,
                    'description'=>$leave->details,
                    'booking_id'=>$booking->id,
                ]);
        }elseif($schedule>0){
            Toastr()->error('This Cleaner Have Booking Or Leave Permission At Same Time','Error');
            return back();
        }

        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Submit Hiring By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Submit Hiring To Employee Code MJ-'.$employee->code,
        ]);

        Toastr()->success('Hiring Submitted Successfully','Success');
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
     * @param  int  $hiring
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingMdl $hiring)
    {
        $hiring::find($hiring);

        $cleaners = EmployeeMdl::where('position', 'Cleaner')->get();

         $HiredCleaners = UserHasBookingMdl::where('booking_id',$hiring->id)->get()->pluck('booking_id','user_id')->all();

        return view('admin.hiring.edit',compact('hiring','cleaners','HiredCleaners'));
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
            'booking' =>'required|numeric|exists:booking,id',
            'nameEn' =>'required|numeric|exists:users,id',
            'type'         =>'required|numeric',
            'startDate' =>'required|string',
            'endDate' =>'required|string',
        ],[
            'booking.required'=>'Customer Name Is Required.',
            'booking.numeric'=>'Format Not Matching.',
            'booking.exists'=>'This Name Is Not In The Team.',
           
            'nameEn.required'=>'Employee Name Is Required.',
            'nameEn.numeric'=>'Format Not Matching.',
            'nameEn.exists'=>'This Name Is Not In The Team.',
           
            'type.required'=>'Leave Type Is Required.',
            'type.numeric'=>'Format Not Matching.',
           
            'startDate.required'=>'Start Date  Is Required.',
            'startDate.string'=>'Format Not Matching.',
           
            'endDate.required'=>'End Date Is Required.',
            'endDate.string'=>'Format Not Matching.',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $booking = BookingMdl::find($req->booking);

        $startDate = Carbon::createFromFormat('d/m/Y', $req->startDate)->format('Y-m-d');

        if($req->startTime !==null){ 
            $startTime =date('H:i:s',strtotime($req->startTime));
            //$startTime = Carbon::createFromFormat('H:i A', )->format('H:i:s');
        }else{
            
            $startTime = Carbon::createFromFormat('H:i:s', '09:00:00')->format('H:i:s');
        }
        
        $endDate = Carbon::createFromFormat('d/m/Y', $req->endDate)->format('Y-m-d');

        if($req->endTime !==null){
             $endTime =date('H:i:s',strtotime($req->endTime));
             //$endTime = Carbon::createFromFormat('H:i A', '$req->endTime')->format('H:i:s');
        }else{            
            $endTime = Carbon::createFromFormat('H:i:s', '23:59:59')->format('H:i:s');
        }

        $employee = EmployeeMdl::where('user_id',$req->nameEn)->first();
       
        $schedule = CleanerScheduleMdl::where('start_job','<=',Carbon::parse($startDate.' '.$startTime))->where('end_job','>=',Carbon::parse($endDate.' '.$endTime))->where('user_id',$employee->user_id)->count();

        //CLEANER SCHEDULE 
        if($schedule==1){
            $customer = CustomerMdl::where('user_id',$req->customer)->first();
        
            $booking->start_date = Carbon::parse($startDate.' '.$startTime);
            $booking->end_date  = Carbon::parse($endDate.' '.$endTime);
            $booking->total          = $req->cost;
            $booking->save();

            $booking->usersHasBookings()->sync($employee->user_id);

            $schedule =CleanerScheduleMdl::where('booking_id',$booking->id)->first();

            $leave = LeaveMdl::find($schedule->leave_id);
            
            $leave->start_at = $startDate.' '.$startTime;
            $leave->end_at = $endDate.' '.$endTime;
            $leave->save();            

            $schedule->start_job = Carbon::parse($startDate.' '.$startTime);
            $schedule->end_job  = Carbon::parse($endDate.' '.$endTime);
            $schedule->save();

        }elseif($schedule>0){
            Toastr()->error('This Cleaner Have Booking Or Leave Permission At Same Time','Error');
            return back();
        }

        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Update Hiring By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Update Hiring To Employee Code MJ-'.$employee->code,
        ]);

        Toastr()->success('Hiring Updated Successfully','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}