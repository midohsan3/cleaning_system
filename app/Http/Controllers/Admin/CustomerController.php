<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\CustomerMdl;
use App\Models\EmployeeMdl;
use Illuminate\Http\Request;
use App\Models\UserActivityMdl;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
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
        $customers = CustomerMdl::orderBy('id','DESC')->paginate(pageCount);

        $customersCount = $customers->count();

        $list_tile = 'All';
        
        return view('admin.customer.index', compact('customers', 'customersCount', 'list_tile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Req  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'nameEn'=>'required|string',
            'mail'=>'nullable|email|unique:users,email',
            'phone'=>'required|string|unique:users,phone',
            'address'=>'nullable|string',
            'address_sec'=>'nullable|string',
            'notes'=>'nullable|string',
        ],[
            'nameEn.required'=>'Customer Name Is Required.',
            'nameEn.string'=>'Format Not Matching.',
            
            'mail.email'=>'Format Not Matching.',
            
            'phone.required'=>'Customer Name Is Required.',
            'phone.string'=>'Format Not Matching.',
           
            'address.string'=>'Format Not Matching.',

            'address_sec.string'=>'Format Not Matching.',

            'notes.string'=>'Format Not Matching.',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::create([
            'name'=>$req->nameEn,
            'email'=>$req->mail,
            'phone'=>$req->phone,
            'password'=>Hash::make('user'),
            'role_name'=>'Customer',
        ]);
        
        $role = Role::where('name',$user->role_name)->first();
        $user->assignRole([$role->id]);

        $customer = CustomerMdl::create([
            'user_id'=>$user->id,
            'added_by'=>1,
            'address'=>$req->address,
            'address_sec'=>$req->address_sec,
            'notes'=>$req->notes,
        ]);

        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Register New Customer '.$user->name,
        ]);

        Toastr()->success('New Customer Added Successfully','Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(User $customer)
    {
        $customer::find($customer);

        return view('admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerMdl $customer)
    {
        $customer::find($customer);

        return view('admin.customer.edit', compact('customer'));
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
            'customer'=>'required|numeric|exists:customers,id',
            'user'=>'required|numeric|exists:users,id',
            'nameEn'=>'required|string',
            'mail'=>'nullable|email|unique:users,email,'.$req->user,
            'phone'=>'required|string|unique:users,phone,'.$req->user,
            'address'=>'nullable|string',
            'address_sec'=>'nullable|string',
            'notes'=>'nullable|string',
        ],[
            'nameEn.required'=>'Customer Name Is Required.',
            'nameEn.string'=>'Format Not Matching.',
            
            'mail.email'=>'Format Not Matching.',
            
            'phone.required'=>'Customer Name Is Required.',
            'phone.string'=>'Format Not Matching.',
           
            'address.string'=>'Format Not Matching.',

            'address_sec.string'=>'Format Not Matching.',

            'notes.string'=>'Format Not Matching.',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::findOrFail($req->user);

        $user->name = $req->nameEn;
        $user->email = $req->mail;
        $user->phone = $req->phone;
        $user->status = 1;
        $user->save();

        $customer = CustomerMdl::findOrFail($req->customer);

        $customer->address= $req->address;
        $customer->address_sec= $req->address_sec;
        $customer->notes= $req->notes;
        $customer->save();

        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Update Information For Customer '.$user->name,
        ]);

        Toastr()->success('Update Customer Information Successfully','Success');
        return back();
    }

    public function hiring($customer){
        $customer = User::find($customer);

        $cleaners = EmployeeMdl::where('position','Cleaner')->get();
        
        return view('admin.customer.hiring', compact('customer','cleaners'));
    }
     /**
     * ============================
     * ============================
     */

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
