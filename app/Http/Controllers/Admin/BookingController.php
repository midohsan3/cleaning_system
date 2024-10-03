<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\BillMdl;
use App\Models\BookingMdl;
use App\Models\ServiceMdl;
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

class BookingController extends Controller
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
        $bookings = BookingMdl::where('type', 0)->orderBy('id', 'DESC')->paginate(pageCount);

        $bookingsCount = $bookings->count();

        $bookingCleaners = UserHasBookingMdl::get()->pluck('user_id', 'booking_id')->all();

        $cleaners = EmployeeMdl::where('position', 'Cleaner')->get();

        $list_tile = 'All';

        return view('admin.booking.index', compact('bookings', 'bookingsCount', 'bookingCleaners', 'cleaners', 'list_tile'));
    }
    /**
     * Display a schedule of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function schedule()
    {
        $schedule = CleanerScheduleMdl::whereIn('type', [5, 6])->get();

        return view('admin.booking.schedule', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $customer
     * @return \Illuminate\Http\Response
     */
    public function create($customer)
    {
        $customer = User::find($customer);
        $services = ServiceMdl::where('status', 1)->orderBy('name_en')->get();

        return view('admin.booking.create', compact('customer', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'customer' => 'required|numeric|exists:users,id',
            'service' => 'required|numeric|exists:services,id',
            'cleanersCount' => 'required|numeric',
            'hours' => 'required|numeric',
            'days' => 'required|numeric',
            'months' => 'required|numeric',
            'startDate' => 'required|string',
            'materials' => 'required|numeric',
        ], [
            'customer.required' => 'Customer Is Required.',
            'customer.numeric' => 'Format Not Matching.',
            'customer.exists'    => 'This Customer Is Not Exists.',

            'service.required' => 'Service Is Required.',
            'service.numeric' => 'Format Not Matching.',
            'service.exists'    => 'This Service Is Not Exists.',

            'cleanersCount.required' => 'Cleaners Count Is Required.',
            'cleanersCount.numeric' => 'Format Not Matching.',

            'hours.required' => 'Hours Is Required.',
            'hours.numeric' => 'Format Not Matching.',

            'days.required' => 'Days Is Required.',
            'days.numeric' => 'Format Not Matching.',

            'months.required' => 'Month Is Required.',
            'months.numeric' => 'Format Not Matching.',

            'startDate.required' => 'Month Is Required.',
            'startDate.string' => 'Format Not Matching.',

            'materials.required' => 'Materials Is Required.',
            'materials.string' => 'Format Not Matching.',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $service = ServiceMdl::find($req->service);

        $customer = CustomerMdl::where('user_id', $req->customer)->first();

        $startDate = Carbon::createFromFormat('d/m/Y', $req->startDate)->format('Y-m-d');

        if ($req->startTime !== null) {
            $startTime = Carbon::createFromFormat('H:i:s', $req->startTime)->format('H:i:s');
        } else {
            $startTime = Carbon::createFromFormat('H:i:s', '09:00:00')->format('H:i:s');
        }

        if ($req->hours > 0) {
            $endDate = Carbon::parse($startDate . ' ' . $startTime)->addHour($req->hours);
        } elseif ($req->days == 1) {
            $endDate = Carbon::parse($startDate . ' 23:59:59');
        } elseif ($req->days > 1) {
            $endDate = Carbon::parse($startDate . ' ' . $startTime)->addDay($req->days - 1);
        } elseif ($req->months > 0) {
            $endDate = Carbon::parse($startDate . ' ' . $startTime)->addMonth($req->months - 1);
        }

        $hoursCost   = $req->cleanersCount * $req->hours * $service->h_price;
        $daysCost     = $req->cleanersCount * $req->days * $service->d_price;
        $monthCost = $req->cleanersCount * $req->months * $service->m_price;
        $totalWithoutMaterials = $hoursCost + $daysCost + $monthCost;

        if ($req->materials == 1) {
            $materialsHoursCost = $req->cleanersCount * $req->hours * 5;
            $materialsDaysCost = $req->cleanersCount * $req->days * 8 * 5;
            $materialsDaysCost = $req->cleanersCount * $req->months * 8 * 26 * 5;
            $material = $materialsHoursCost + $materialsDaysCost + $materialsDaysCost;
        } else {
            $material = 0;
        }



        $booking = BookingMdl::create([
            'user_id'        => $customer->user_id,
            'service_id'     => $service->id,
            'ref_no'         => 'JM' . date('YmdHis', strtotime(now())),
            'address'        => $customer->address,
            'cleaners_count' => $req->cleanersCount,
            'hours'          => $req->hours,
            'days'           => $req->days,
            'months'         => $req->months,
            'start_date'     => Carbon::parse($startDate . ' ' . $startTime),
            'end_date'       => Carbon::parse($endDate),
            'hours_cost'     => $hoursCost,
            'days_cost'      => $daysCost,
            'month_cost'     => $monthCost,
            'material_cost'  => $material,
            'discount'       => 0,
            'total' => $material + $totalWithoutMaterials,
        ]);

        //MAKE INVOICE

        $bill = BillMdl::create([
            'bill_no' => $booking->ref_no,
            'booking_id' => $booking->id,
            'user_id'    => $customer->user_id,
            'total'      => $booking->total,
            'materials'  => $booking->material_cost,
            'discount'  => $booking->discount,
            'subtotal'  => $booking->total - $booking->discount,
            'paid_amount'  => 0,
        ]);

        //USER ACTIVITY
        UserActivityMdl::create([
            'user_id' => Auth::user()->id,
            'action' => 'Submit New Booking No' . $booking->ref_no,
        ]);

        Toastr()->success('Booking Submitted Successfully', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(BookingMdl $booking)
    {
        $booking::find($booking);

        $schedule = CleanerScheduleMdl::where('booking_id', $booking->id)->get();

        return view('admin.booking.schedule', compact('schedule'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $booking
     * @return \Illuminate\Http\Response
     */
    public function assign(BookingMdl $booking)
    {
        $booking::find($booking);

        $cleaners = EmployeeMdl::where('position', 'Cleaner')->inRandomOrder()->get();

        foreach ($cleaners as $cleaner) {
            $schedule = CleanerScheduleMdl::where('start_job', '<=', $booking->start_date)->where('end_job', '>=', $booking->end_date)->where('user_id', $cleaner->user_id)->count();

            if ($schedule == 0) {
                if ($booking->cleaners_assign < $booking->cleaners_count) {

                    //CLEANER SCHEDULE
                    CleanerScheduleMdl::create([
                        'user_id' => $cleaner->user_id,
                        'start_job' => $booking->start_date,
                        'end_job' => $booking->end_date,
                        'type' => 5,
                        'description' => 'Booking No.' . $booking->ref_no,
                        'booking_id' => $booking->id,
                    ]);

                    $booking->usersHasBookings()->sync($cleaner->user_id);

                    $booking->cleaners_assign += 1;
                    $booking->save();

                    //EMPLOYEE HISTORY
                    EmployeeHistoryMdl::create([
                        'employee_id' => $cleaner->id,
                        'user_id' => Auth::user()->id,
                        'action' => 'Submit Booking NO.' . $booking->ref_no . ' By ' . Auth::user()->name,
                    ]);

                    //USER ACTIVITY
                    UserActivityMdl::create([
                        'user_id' => Auth::user()->id,
                        'action' => 'Assign Booing NO' . $booking->ref_no . ' To Cleaner Code ' . $cleaner->code,
                    ]);
                }
            }
        }
        if ($booking->cleaners_count == $booking->cleaners_assign) {
            $booking->status = 2;
            $booking->save();
        }
        $schedule = CleanerScheduleMdl::where('booking_id', $booking->id)->get();

        return view('admin.booking.schedule', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingMdl $booking)
    {
        $booking::find($booking);

        $services = ServiceMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

        return view('admin.booking.edit', compact('booking', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'booking' => 'required|numeric|exists:booking,id',
            'service' => 'required|numeric|exists:services,id',
            'cleanersCount' => 'required|numeric',
            'hours' => 'required|numeric',
            'days' => 'required|numeric',
            'months' => 'required|numeric',
            'startDate' => 'required|string',
            'materials' => 'required|numeric',
        ], [
            'booking.required' => 'Booking Is Required.',
            'booking.numeric' => 'Format Not Matching.',
            'booking.exists'    => 'This Booking Is Not Exists.',

            'service.required' => 'Service Is Required.',
            'service.numeric' => 'Format Not Matching.',
            'service.exists'    => 'This Service Is Not Exists.',

            'cleanersCount.required' => 'Cleaners Count Is Required.',
            'cleanersCount.numeric' => 'Format Not Matching.',

            'hours.required' => 'Hours Is Required.',
            'hours.numeric' => 'Format Not Matching.',

            'days.required' => 'Days Is Required.',
            'days.numeric' => 'Format Not Matching.',

            'months.required' => 'Month Is Required.',
            'months.numeric' => 'Format Not Matching.',

            'startDate.required' => 'Month Is Required.',
            'startDate.string' => 'Format Not Matching.',

            'materials.required' => 'Materials Is Required.',
            'materials.string' => 'Format Not Matching.',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $booking = BookingMdl::find($req->booking);

        $service = ServiceMdl::find($req->service);

        $customer = CustomerMdl::where('user_id', $booking->user_id)->first();

        $startDate = Carbon::createFromFormat('d/m/Y', $req->startDate)->format('Y-m-d');

        if ($req->startTime !== null) {
            $startTime = date('H:i:s', strtotime($req->startTime));
        } else {

            $startTime = Carbon::createFromFormat('H:i:s', '09:00:00')->format('H:i:s');
        }

        if ($req->hours > 0) {
            $endDate = Carbon::parse($startDate . ' ' . $startTime)->addHour($req->hours);
        } elseif ($req->days = 1) {
            $endDate = Carbon::parse($startDate . ' 11:59:59');
        } elseif ($req->days > 1) {
            $endDate = Carbon::parse($startDate . ' ' . $startTime)->addDay($req->days);
        } elseif ($req->months > 0) {
            $endDate = Carbon::parse($startDate . ' ' . $startTime)->addMonth($req->months);
        }

        $hoursCost   = $req->cleanersCount * $req->hours * $service->h_price;
        $daysCost     = $req->cleanersCount * $req->days * $service->d_price;
        $monthCost = $req->cleanersCount * $req->months * $service->m_price;
        $totalWithoutMaterials = $hoursCost + $daysCost + $monthCost;

        if ($req->materials == 1) {
            $materialsHoursCost = $req->cleanersCount * $req->hours * 5;
            $materialsDaysCost = $req->cleanersCount * $req->days * 8 * 5;
            $materialsDaysCost = $req->cleanersCount * $req->months * 8 * 26 * 5;
            $material = $materialsHoursCost + $materialsDaysCost + $materialsDaysCost;
        } else {
            $material = 0;
        }

        $booking->service_id = $service->id;
        $booking->cleaners_count = $req->cleanersCount;
        $booking->cleaners_assign = 0;
        $booking->hours = $req->hours;
        $booking->days = $req->days;
        $booking->months = $req->months;
        $booking->start_date = Carbon::parse($startDate . ' ' . $startTime);
        $booking->end_date = Carbon::parse($endDate);
        $booking->hours_cost = $hoursCost;
        $booking->days_cost = $daysCost;
        $booking->month_cost = $monthCost;
        $booking->material_cost = $material;
        $booking->total = $material + $totalWithoutMaterials;
        $booking->status = 1;
        $booking->save();

        //UPDATE CUSTOMER LAST BOOKING

        $customer->last_booking = Carbon::parse(now());
        $customer->save();

        //USER ACTIVITY
        UserActivityMdl::create([
            'user_id' => Auth::user()->id,
            'action' => 'Update and Approve Booking No' . $booking->ref_no,
        ]);

        //CHECK SCHEDULE
        $schedule = CleanerScheduleMdl::where('booking_id', $booking->id)->get();

        foreach ($schedule as $evnt) {
            $evnt->delete();
        }

        Toastr()->success('Booking Updated Successfully', 'Success');
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
