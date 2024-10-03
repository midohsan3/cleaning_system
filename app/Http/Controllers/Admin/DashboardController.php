<?php

namespace App\Http\Controllers\Admin;

use App\Models\BillMdl;
use App\Models\BookingMdl;
use App\Models\ServiceMdl;
use App\Models\CustomerMdl;
use App\Models\EmployeeMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $monthly_bills = BillMdl::select('paid_amount')->where('status', 2)->whereMonth('paid_at', Carbon::now()->month)->get();
        $monthly_revenue = $monthly_bills->sum('paid_amount');

        $weekly_bills = BillMdl::select('paid_amount')->where('status', 2)->whereBetween('paid_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek(),])->get();
        $weekly_revenue = $weekly_bills->sum('paid_amount');

        $new_booking = BookingMdl::where('status', 0)->count();



        $services = ServiceMdl::where('status', 1)->count();

        $cleaners = EmployeeMdl::where('position', 'Cleaner')->count();

        $jan_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 1)->get();
        $jan_revenue = $jan_booking->sum('total');

        $jan_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 1)->get();
        $jan_loss = $jan_canceled->sum('total');

        $feb_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 2)->get();
        $feb_revenue = $feb_booking->sum('total');

        $feb_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 2)->get();
        $feb_loss = $feb_canceled->sum('total');

        $mar_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 3)->get();
        $mar_revenue = $mar_booking->sum('total');

        $mar_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 3)->get();
        $mar_loss = $mar_canceled->sum('total');

        $apr_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 4)->get();
        $apr_revenue = $apr_booking->sum('total');

        $apr_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 4)->get();
        $apr_loss = $apr_canceled->sum('total');

        $may_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 5)->get();
        $may_revenue = $may_booking->sum('total');

        $may_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 5)->get();
        $may_loss = $may_canceled->sum('total');

        $jun_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 6)->get();
        $jun_revenue = $jun_booking->sum('total');

        $jun_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 6)->get();
        $jun_loss = $jun_canceled->sum('total');

        $jul_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 7)->get();
        $jul_revenue = $jul_booking->sum('total');

        $jul_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 7)->get();
        $jul_loss = $jul_canceled->sum('total');

        $aug_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 8)->get();
        $aug_revenue = $aug_booking->sum('total');

        $aug_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 8)->get();
        $aug_loss = $aug_canceled->sum('total');

        $sep_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 9)->get();
        $sep_revenue = $sep_booking->sum('total');

        $sep_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 9)->get();
        $sep_loss = $sep_canceled->sum('total');

        $oct_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 10)->get();
        $oct_revenue = $oct_booking->sum('total');

        $oct_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 10)->get();
        $oct_loss = $oct_canceled->sum('total');

        $nov_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 11)->get();
        $nov_revenue = $nov_booking->sum('total');

        $nov_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 11)->get();
        $nov_loss = $nov_canceled->sum('total');

        $dec_booking = BookingMdl::select('total')->where('status', 3)->whereMonth('created_at', 12)->get();
        $dec_revenue = $dec_booking->sum('total');

        $dec_canceled = BookingMdl::select('total')->where('status', 4)->whereMonth('created_at', 12)->get();
        $dec_loss = $dec_canceled->sum('total');

        $totalBooking = BookingMdl::whereNot('status', 4)->count();
        $scheduleBooking = BookingMdl::where('status', 2)->count();
        $canceledBooking = BookingMdl::where('status', 4)->count();
        $totalCustomers = CustomerMdl::count();

        $last_booking = BookingMdl::where('type', 0)->orderBy('id', 'DESC')->limit(5)->get();

        return view('admin.dashboard.managment', compact('monthly_revenue', 'weekly_revenue', 'new_booking', 'services', 'cleaners', 'jan_revenue', 'jan_loss', 'feb_revenue', 'feb_loss', 'mar_revenue', 'mar_loss', 'apr_revenue', 'apr_loss', 'may_revenue', 'may_loss', 'jun_revenue', 'jun_loss', 'jul_revenue', 'jul_loss', 'aug_revenue', 'aug_loss', 'sep_revenue', 'sep_loss', 'oct_revenue', 'oct_loss', 'nov_revenue', 'dec_revenue', 'dec_loss', 'nov_loss', 'totalBooking', 'scheduleBooking', 'totalCustomers', 'canceledBooking', 'last_booking'));
    }
}