<?php

namespace App\Http\Controllers\Admin;

use App\Models\CashMdl;
use Illuminate\Http\Request;
use App\Models\UserActivityMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CashController extends Controller
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
        $cash = CashMdl::orderBy('id', 'DESC')->paginate(pageCount);        
        $deposit = $cash->sum('deposit');
        $credit = $cash->sum('credit');
        $total = $deposit - $credit;
        
        return view('admin.cash.index', compact('cash','total'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deposit(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'amount'=>'required|numeric',
            'description'=>'required|string'
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }

        CashMdl::create([
            'transaction'=>$req->description,
            'deposit'       =>$req->amount,
        ]);

        
        //USER ACTIVITY
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Add New Cash Deposit '.$req->amount.'AED From ' .$req->description,
        ]);

        Toastr()->success('Transaction Added Successfully.', 'Success');
        return redirect()->route('admin.cash.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CashMdl $cash)
    {
        $cash::find($cash);
        return view('admin.cash.edit', compact('cash'));
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
        $vaild = Validator::make($req->all(),[
            'cash'           =>'required|numeric|exists:cash,id',
            'deposit'      =>'required|numeric',
            'description'=>'required|string',
        ],[
            'cash.required'=>'This Filed is required',
            'cash.numeric'=>'Format not matching',
            'cash.exists'    =>'Filed not exists',
           
            'deposit.required'=>'This Filed is required',
            'deposit.numeric'=>'Format not matching',
          
            'description.required'=>'This Filed is required',
            'description.string'     =>'Format not matching',
        ]);

        if($vaild->fails()){
            return back()->withErrors($vaild)->withInput($req->all());
        }

        $cash = CashMdl::find($req->cash);

        $cash->transaction = $req->description;
        $cash->deposit        = $req->deposit;
        $cash->save();

        //USER ACTIVITY
        UserActivityMdl::create([
            'user_id' => Auth::user()->id,
            'action' => 'Add New Cash Deposit To' . $req->deposit . 'AED From ' . $req->description,
        ]);

        Toastr()->success('Transaction Updated Successfully.', 'Success');
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
        $vaild = Validator::make($req->all(),[
            'transactionID'           =>'required|numeric|exists:cash,id',
        ],[
            'transactionID.required'=>'This Filed is required',
        ]);

        if($vaild->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }
        
         $cash = CashMdl::find($req->transactionID);
         //USER ACTIVITY
        UserActivityMdl::create([
            'user_id' => Auth::user()->id,
            'action' => 'Delete Cash Deposit ' . $cash->deposit . 'AED From ' . $cash->description,
        ]);

        $cash->delete();
        Toastr()->success('Transactions Deleted Successfully.', 'Success');
        return back();
    }
}
