<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BillMdl;
use App\Models\CartMdl;
use App\Models\BookingMdl;
use App\Models\ServiceMdl;
use App\Models\CustomerMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\FrontBookingController;

class FrontBookingController extends Controller
{
    public function index()
    {
        if (App::getLocale() == 'ar') {
            $services = ServiceMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $services = ServiceMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        return view('front.order', compact('services'));
    }

    public function get_service(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'service' => 'required|numeric|exists:services,id',
            'period' => 'required',
        ], [
            'service.required' => 'Please Choose the Service you need.',
            'service.numeric' => 'Format Not Matching.',
            'service.exists'     => 'This Service Not Exists.',

            'period.required' => 'Service Method Is Required.',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $service = ServiceMdl::findOrFail($req->service);

        return redirect()->route('front.booking.step_tow', ['service' => $service->id, 'book_method' => $req->period]);
    }

    public function step_tow(ServiceMdl $service, $book_method)
    {
        $service::find($service);
        return view('front.order2', compact('service', 'book_method'));
    }

    public function step_tow_store(Request $req)
    {

        $valid = Validator::make($req->all(), [
            'service' => 'required|numeric|exists:services,id',
            'cleaners' => 'required|numeric',
            'hour' => 'required|numeric',
            'day' => 'required|numeric',
            'month' => 'required|numeric',
        ], [
            'service.required' => 'Please Choose the Service you need.',
            'service.numeric' => 'Format Not Matching.',
            'service.exists'     => 'This Service Not Exists.',

            'cleaners.required' => 'Please Choose the Service you need.',
            'cleaners.numeric' => 'Format Not Matching.',

            'hour.required' => 'Please Choose the Service you need.',
            'hour.numeric' => 'Format Not Matching.',

            'day.required' => 'Please Choose the Service you need.',
            'day.numeric' => 'Format Not Matching.',

            'month.required' => 'Please Choose the Service you need.',
            'month.numeric' => 'Format Not Matching.',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $service = ServiceMdl::findOrFail($req->service);

        if (session()->has('cart')) {
            $cart = new CartMdl(session()->forget('cart'));
            $cart = new CartMdl();
        } else {
            $cart = new CartMdl();
        }

        $cart->add($service, $req->cleaners, $req->hour, $req->day, $req->month, 0, null, null);
        //dd($cart->cServices);

        session()->put('cart', $cart);

        return view('front.order3', compact('service'));
    }

    public function step_three_store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'material' => 'required|numeric',
            // 'statDate'=>'required|date',
            //'statTime'=>'nullable|time',
        ], [
            'material.required' => 'Please Choose The Option.',
            'material.numeric' => 'Please Choose The Option.',

            'statDate.required' => 'Service Date Is Required.',
            'statDate.date' => 'Format Not Matching.',

            'statTime.time' => 'Format Not Matching.',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all);
        }

        if (session()->has('cart')) {

            foreach (session()->get('cart')->cServices as $cService) {
                $service = ServiceMdl::find($cService['product']);
                $cleaners = $cService['cleaners'];
                $hours = $cService['hours'];
                $days = $cService['days'];
                $months = $cService['months'];
            }


            if ($req->material == 1) {
                $material_for_hours = $cleaners * $hours * 5;
                $material_for_days = $cleaners * $days * 8 * 5;
                $material_for_months = $cleaners * $months * 8 * 26 * 5;

                $materialsCPrices = $material_for_hours + $material_for_days + $material_for_months;
            } else {
                $materialsCPrices = 0;
            }
        } else {
            return redirect()->route('front.booking.index');
        }

        if ($req->statDate) {
            $startDate = $req->statDate;;
        } else {
            $startDate = null;
        }

        if ($req->statTime) {
            //$startTime = Carbon::parse($req->startTime)->format('H:i:s');
            $startTime = date('H:i:s', strtotime($req->startTime));
        } else {
            $startTime = Carbon::parse('09:00:00')->format('H:i:s');
        }

        $cart = new CartMdl(session()->forget('cart'));
        $cart = new CartMdl();

        $cart->add($service, $cleaners, $hours, $days, $months, $materialsCPrices, $startDate, $startTime);

        //dd($cart);

        session()->put('cart', $cart);

        if (Auth::check() && Auth::user()->role_name == 'Customer') {
            return redirect()->route('front.booking.store', Auth::user()->id);
        }
        return redirect()->route('front.booking.step_four');
    }

    public function step_four()
    {
        return view('front.order4');
    }

    public function step_four_store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name' => 'required|string|min:3',
            'phone' => 'required|string|min:9|max:13|unique:users,phone',
            'email' => 'nullable|email|unique:users,email',
            'address' => 'required|string|min:10',
        ], [
            'name.required' => 'Name Is Required.',
            'name.string' => 'Format Not Matching.',
            'name.min' => 'Name Is Too Short.',

            'phone.required' => 'Phone Is Required.',
            'phone.string' => 'Format Not Matching.',
            'phone.min' => 'Phone Is Too Short.',
            'phone.max' => 'Check Your Number Again.',
            'phone.unique' => 'This Number is Already Exists Maybe you already have account in our system please login.',

            'email.email' => 'This is not email Format.',
            'email.unique' => 'This Email is Already Exists Maybe you already have account in our system please login.',

            'address.required' => 'Address Is Required.',
            'address.string' => 'Format Not Matching.',
            'address.min' => 'Address Is Too Short.',
        ]);

        if ($valid->fails()) {
            return redirect()->route('front.booking.step_four')->withErrors($valid)->withInput($req->all());
        }

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'password' => Hash::make('customer'),
            'role_name' => 'Customer',
            'status' => '1',
        ]);

        $role = Role::where('name', $user->role_name)->first();
        $user->assignRole([$role->id]);

        $customer = CustomerMdl::create([
            'user_id' => $user->id,
            'added_by' => 0,
            'address' => $req->address,
        ]);

        return redirect()->route('front.booking.store', $user->id);
    }

    public function store(User $user)
    {

        $user::find($user);

        if (session()->has('cart')) {
            foreach (session()->get('cart')->cServices as $cService) {
                $service = ServiceMdl::find($cService['product']);
            }

            $cleaners = session()->get('cart')->cleaners;
            $hours = session()->get('cart')->hourCCount;
            $days = session()->get('cart')->dayCCount;
            $months = session()->get('cart')->monthCCount;
            $startDate = session()->get('cart')->startDate;
            $endDate = session()->get('cart')->end_date;
            $hourCost = $cleaners * $hours * $service->h_price;
            $daysCost = $cleaners * $days * $service->d_price;
            $monthCost = $cleaners * $months * $service->m_price;
            $materials = session()->get('cart')->materialsCPrices;

            $booking = BookingMdl::create([
                'user_id' => $user->id,
                'service_id' => $service->id,
                'ref_no' => 'JM' . date('YmdHis', strtotime(now())),
                'address' => $user->customerWUser->address,
                'cleaners_count' => $cleaners,
                'hours' => $hours,
                'days' => $days,
                'start_date' => Carbon::parse($startDate),
                'end_date' => Carbon::parse($endDate),
                'hours_cost' => $hourCost,
                'days_cost' => $daysCost,
                'month_cost' => $monthCost,
                'material_cost' => $materials,
                'discount' => 0,
                'total' => $hourCost + $daysCost + $monthCost + $materials,
            ]);

            //MAKE INVOICE

            $bill = BillMdl::create([
                'bill_no' => $booking->ref_no,
                'booking_id' => $booking->id,
                'user_id'    => $booking->user_id,
                'total'      => $booking->total,
                'materials'  => $booking->material_cost,
                'discount'  => $booking->discount,
                'subtotal'  => $booking->total - $booking->discount,
                'paid_amount'  => 0,
            ]);

            $customerData = CustomerMdl::where('user_id', $user->id)->first();
            $customerData->last_booking = date('d-m-Y', strtotime(now()));
            $customerData->save();



            $cart = new CartMdl(session()->forget('cart'));
            return redirect()->route('front.booking.thank_you');
        }
    }

    public function thank_you()
    {
        return view('front.order5');
    }
}
