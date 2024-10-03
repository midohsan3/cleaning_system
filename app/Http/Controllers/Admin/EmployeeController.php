<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\SkillMdl;
use App\Mail\WelcomeStaff;
use App\Models\EmployeeMdl;
use Illuminate\Http\Request;
use App\Models\NationalityMdl;
use App\Models\UserActivityMdl;
use App\Models\UserHasSkillsMdl;
use App\Models\EmployeeHistoryMdl;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
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
        $employees = EmployeeMdl::orderBy('id','DESC')->paginate(pageCount);

        $employeesCount = $employees->count();

        $list_tile = 'All';
        
        return view('admin.employee.index', compact('employees', 'employeesCount', 'list_tile'));
    }
    /**
     * Display a listing of the Cleaners resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cleaner()
    {
        $employees = EmployeeMdl::where('position','Cleaner')->orderBy('id','DESC')->paginate(pageCount);

        $employeesCount = $employees->count();

        $list_tile = 'Cleaners ';
        
        return view('admin.employee.index', compact('employees', 'employeesCount', 'list_tile'));
    }
    /**
     * Display a listing of the Staff resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staff()
    {
        $employees = EmployeeMdl::whereNot('position','Cleaner')->orderBy('id','DESC')->paginate(pageCount);

        $employeesCount = $employees->count();

        $list_tile = 'Staff ';
        
        return view('admin.employee.index', compact('employees', 'employeesCount', 'list_tile'));
    }
    
    /**
     * Display a listing of the History resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history(User $employee)
    {
         $employee::find($employee);

        $actions = EmployeeHistoryMdl::where('employee_id',$employee->id)->orderBy('id','DESC')->paginate(pageCount);
        
        return view('admin.employee.history', compact('employee','actions'));
    }
    
    /**
     * Display a listing of the History resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activity(User $employee)
    {
         $employee::find($employee);

         $actions = UserActivityMdl::where('user_id',$employee->id)->orderBy('id','DESC')->paginate(pageCount);
        
        return view('admin.employee.activity', compact('employee','actions'));
    }
    /**
     * Display a listing of the Trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $employees = EmployeeMdl::onlyTrashed()->orderBy('id','DESC')->paginate(pageCount);

        $list_tile = 'Trashed ';
        
        return view('admin.employee.trashed', compact('employees', 'list_tile'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $nationalities = NationalityMdl::where('status',1)->orderBy('name_en','ASC')->get();

         return view('admin.employee.create', compact('nationalities'));
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
            'nameEn'       =>'required|string',
            'gender'          =>'required|numeric',
            'nationality'    =>'required|numeric|exists:nationalities,id',
            'birthDate'    =>'required',
            'mail'             =>'nullable|email|unique:users,email',
            'phone'          =>'required|numeric|unique:users,phone',
            'position'      =>'required|string',
            'jonDate'      =>'required',
            'salary'          =>'required|numeric',
            'overtime'    =>'required|numeric',
            'allowance'  =>'required|numeric',

        ],[
            'nameEn.required'=>'Full Name Is Required.',
            'nameEn.string'    =>'Format Not Matching.',
           
            'gender.required'=>'Gender Is Required.',
            'gender.numeric'=>'Format Not Matching.',

            'nationality.required'=>'Gender Is Required.',
            'nationality.numeric'=>'Format Not Matching.',
            'nationality.exists'    =>'This Nationality Is Not Exists.',
            
            'birthDate.required'=>'Birth Is Required.',
            'birthDate.date'      =>'Format Not Matching.',
            
            'mail.email'   =>'Format Not Matching.',
            'mail.unique' =>'This Email Already Exists.',

            'phone.required'=>'Phone Is Required.',
            'phone.numeric'=>'Format Not Matching.',
            'phone.unique'=>'This Number Already Exists.',

            'position.required'=>'Position Is Required.',
            'position.string'    =>'Format Not Matching.',
            
            'jonDate.required'=>'Joining Date Is Required.',
            'jonDate.date'      =>'Format Not Matching.',
            
            'salary.required'=>'Salary Is Required.',
            'salary.numeric'=>'Format Not Matching.',
           
            'overtime.required'=>'Overtime Is Required.',
            'overtime.numeric'=>'Format Not Matching.',
            
            'allowance.required'=>'Allowance Is Required.',
            'allowance.numeric'=>'Format Not Matching.',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::create([
            'name'=>$req->nameEn,
            'email'=>$req->mail,
            'phone'=>$req->phone,
            'password'=>Hash::make('admin'),
            'role_name'=>$req->position,
        ]);

        $role = Role::where('name',$req->position)->first();
        $user->assignRole([$role->id]);

        if($req->passportExpired==null){
            $passportExp = null;
        }else{
           $passportExp= Carbon::createFromFormat('d/m/Y', $req->passportExpired);
        }

        if($req->emExpired==null){
            $emExp = null;
        }else{
           $emExp= Carbon::createFromFormat('d/m/Y', $req->emExpired);
        }
        
        $employee = EmployeeMdl::create([
            'user_id'=>$user->id,
            'nationality_id'=>$req->nationality,
            'code'=>$user->id,
            'position'=>$req->position,
            'birth_date'=>Carbon::createFromFormat('d/m/Y', $req->birthDate),
            'join_date'=>Carbon::createFromFormat('d/m/Y', $req->jonDate),
            'gender'=>$req->gender,
            'passport_no'=>$req->passport,
            'passport_expired_date'=>$passportExp,
            'em_id'=>$req->emNo,
            'em_id_expired_date'=>$emExp,
            'salary_bank_account'=>$req->salaryAccount,
            'salary'=>$req->salary,
            'overtime'=>$req->overtime,
            'allowance'=>$req->allowance,
        ]);
        
        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Register On System By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Register Employee '.$user->name,
        ]);

        if(($user->email) && ($employee->position !=='Cleaner')){
            $data = ['userName'=>$user->name, 'mail'=>$user->email,'pass'=>'admin'];
            Mail::to($user->email)->send(new WelcomeStaff($data));
        }
        
        Toastr()->success('New Employee Added Successfully.', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {
        $employee::find($employee);

        $employeeSkills = UserHasSkillsMdl::where('user_id',$employee->id)->get()->pluck('user_id', 'skill_id')->all();

        $skills = SkillMdl::OrderBy('name_en','ASC')->get();

        return view('admin.employee.show', compact('employee','employeeSkills','skills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeMdl $employee)
    {
        $employee::find($employee);

        $nationalities = NationalityMdl::where('status',1)->get();

        return view('admin.employee.edit', compact('employee','nationalities'));
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
            'employee_id'=>'required|numeric|exists:employees,id',
            'user_id'=>'required|numeric|exists:users,id',
            'nameEn'       =>'required|string',
            'gender'          =>'required|numeric',
            'nationality'    =>'required|numeric|exists:nationalities,id',
            'birthDate'    =>'required',
            'mail'             =>'nullable|email|unique:users,email,'.$req->user_id,
            'phone'          =>'required|numeric|unique:users,phone,'.$req->user_id,
            'position'      =>'required|string',
            'jonDate'      =>'required',
            'salary'          =>'required|numeric',
            'overtime'    =>'required|numeric',
            'allowance'  =>'required|numeric',

        ],[
            'nameEn.required'=>'Full Name Is Required.',
            'nameEn.string'    =>'Format Not Matching.',
           
            'gender.required'=>'Gender Is Required.',
            'gender.numeric'=>'Format Not Matching.',

            'nationality.required'=>'Gender Is Required.',
            'nationality.numeric'=>'Format Not Matching.',
            'nationality.exists'    =>'This Nationality Is Not Exists.',
            
            'birthDate.required'=>'Birth Is Required.',
            'birthDate.date'      =>'Format Not Matching.',
            
            'mail.email'   =>'Format Not Matching.',
            'mail.unique' =>'This Email Already Exists.',

            'phone.required'=>'Phone Is Required.',
            'phone.numeric'=>'Format Not Matching.',
            'phone.unique'=>'This Number Already Exists.',

            'position.required'=>'Position Is Required.',
            'position.string'    =>'Format Not Matching.',
            
            'jonDate.required'=>'Joining Date Is Required.',
            'jonDate.date'      =>'Format Not Matching.',
            
            'salary.required'=>'Salary Is Required.',
            'salary.numeric'=>'Format Not Matching.',
           
            'overtime.required'=>'Overtime Is Required.',
            'overtime.numeric'=>'Format Not Matching.',
            
            'allowance.required'=>'Allowance Is Required.',
            'allowance.numeric'=>'Format Not Matching.',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $employee = EmployeeMdl::find($req->employee_id);

        $user= User::find($employee->user_id);

        $user->name = $req->nameEn;
        $user->email = $req->mail;
        $user->phone = $req->phone;
        $user->role_name = $req->position;
        $user->save();

        $role = Role::where('name',$req->position)->first();
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole([$role->id]);

        if($req->passportExpired==null){
            $passportExp = null;
        }else{
           $passportExp= Carbon::createFromFormat('d/m/Y', $req->passportExpired);
        }

        if($req->emExpired==null){
            $emExp = null;
        }else{
           $emExp= Carbon::createFromFormat('d/m/Y', $req->emExpired);
        }
        
        $employee->nationality_id =$req->nationality;
        $employee->position =$req->position;
        $employee->birth_date =Carbon::createFromFormat('d/m/Y', $req->birthDate);
        $employee->join_date =Carbon::createFromFormat('d/m/Y', $req->jonDate);
        $employee->gender =$req->gender;
        $employee->passport_no =$req->passport;
        $employee->passport_expired_date =$passportExp;
        $employee->em_id =$req->emNo;
        $employee->em_id_expired_date =$emExp;
        $employee->salary_bank_account =$req->salaryAccount;
        $employee->salary =$req->salary;
        $employee->overtime =$req->overtime;
        $employee->allowance =$req->allowance;
        $employee->save();
                
        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Update  Employee Information By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Update Information For Employee '.$user->name,
        ]);

        Toastr()->success('Employee Updated Successfully.', 'Success');
        return back();
    }

    /**
     * Employee Skills List
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function skills(User $employee)
    {   
        $employee::find($employee);

        $employeeSkills = UserHasSkillsMdl::where('user_id', $employee->id)->get()->pluck('user_id', 'skill_id')->all();

        $skills = SkillMdl::orderBy('name_en')->get();

        return view('admin.employee.skill', compact('employee','employeeSkills','skills'));
    }

    /**
     * Update Skills of the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function skills_update(Request $req){
        $valid = Validator::make($req->all(),[
            'user'=>'required|numeric|exists:users,id'
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later','Error');
            return back();
        }

        $user = User::findOrFail($req->user);

        $user->skills()->sync($req->skill);

        Toastr()->success('Skills Updated Successfully','Success');
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
            'employeeID'=>'required|numeric|exists:users,id',

        ]);

        if($valid->fails()){
        Toastr()->error('Please Try Again Later!','Error');
            return back()->withErrors($valid)->withInput($req->all());
        }

         $user = User::find($req->employeeID);

        $employee=EmployeeMdl::where('user_id',$user->id)->first();

        if($employee->position=='Cleaner'){
            $employee->status=1;
            $employee->save();

            $user->status=0;
            $user->save();
        }else{
            $employee->status=0;
            $employee->save();

            $user->status=1;
            $user->save();
        }
                
        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Activate  Employee Information By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Activate Information For Employee '.$user->name,
        ]);

        Toastr()->success('Employee Activated Successfully.', 'Success');
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
            'employeeID'=>'required|numeric|exists:users,id',

        ]);

        if($valid->fails()){
        Toastr()->error('Please Try Again Later!','Error');
            return back()->withErrors($valid)->withInput($req->all());
        }

         $user = User::find($req->employeeID);

        $employee=EmployeeMdl::where('user_id',$user->id)->first();

        if($employee->position=='Cleaner'){
            $employee->status=0;
            $employee->save();

            $user->status=0;
            $user->save();
        }
                
        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Deactivate  Employee Information By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Deactivate Information For Employee '.$user->name,
        ]);

        Toastr()->success('Employee Deactivated Successfully.', 'Success');
        return back();
    }

    /**
     * * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {   
        $valid = Validator::make($req->all(),[
            'employeeID'=>'required|numeric|exists:users,id',

        ]);

        if($valid->fails()){
        Toastr()->error('Please Try Again Later!','Error');
            return back()->withErrors($valid)->withInput($req->all());
        }

         $user = User::find($req->employeeID);

        $employee=EmployeeMdl::where('user_id',$user->id)->first();

        $employee->delete();
       
                
        //EMPLOYEE HISTORY
        EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Trash  Employee Information By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Trash Information For Employee '.$user->name,
        ]);

        //$user->delete();

        Toastr()->success('Employee Trashed Successfully.', 'Success');
        return back();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function restore($employee)
    {
        $employee = EmployeeMdl::withTrashed()->find($employee);

        $employee->restore();

         //EMPLOYEE HISTORY
         EmployeeHistoryMdl::create([
            'employee_id'=>$employee->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Restore  Employee Information By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Restore Information For Employee '.$employee->userWEmployee->name,
        ]);

        Toastr()->success('Employee Restored Successfully.', 'Success');
        return back();

    }

    /**
     * * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function ddestroy(Request $req)
    {
        
        $valid = Validator::make($req->all(),[
            'employeeID'=>'required|numeric|exists:users,id',

        ]);

        if($valid->fails()){
        Toastr()->error('Please Try Again Later!','Error');
            return back()->withErrors($valid)->withInput($req->all());
        }
        
         $user = User::find($req->employeeID);       
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Deleted Information For Employee '.$user->name,
        ]);

        $user->delete();

        Toastr()->success('Employee Deleted Successfully.', 'Success');
        return back();
    }
}
