<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillMdl;
use Illuminate\Http\Request;

class BookingBillController extends Controller
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
    public function get_bill($booking)
    {
        $bill = BillMdl::where('booking_id', $booking)->first();

        return view('admin.booking.bill', compact('bill'));
    }

    public function print_bill($bill)
    {
        $bill = BillMdl::find($bill);

        return view('admin.booking.print', compact('bill'));
    }
}
