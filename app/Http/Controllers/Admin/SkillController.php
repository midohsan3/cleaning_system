<?php

namespace App\Http\Controllers\Admin;

use App\Models\SkillMdl;
use Illuminate\Http\Request;
use App\Models\SkillHistoryMdl;
use App\Models\UserActivityMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
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
        $skills = SkillMdl::orderBy('id','DESC')->paginate(pageCount);

        $skillsCount = $skills->count();

        $list_tile = 'All';

        return view('admin.skill.index', compact('skills', 'skillsCount', 'list_tile'));
    }
    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $skills = SkillMdl::onlyTrashed()->orderBy('id','DESC')->paginate(pageCount);

        $list_tile = 'Trashed';

        return view('admin.skill.trashed', compact('skills','list_tile'));
    }
    /**
     * Display a listing activities of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activity(SkillMdl $skill)
    {
        $skill::find($skill);

        $actions = SkillHistoryMdl::where('skill_id',$skill->id)->orderBy('id','DESC')->paginate(pageCount);
        
       return view('admin.skill.activity', compact('skill','actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skill.create');
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
        'nameEn'=>'required|string|unique:skills,name_en',
        'nameAr'=>'nullable|string|unique:skills,name_ar',
       ],[
        'nameEn.required'=>'English Name Is Required.',
        'nameEn.string'=>'Format Not Matching.',
        'nameEn.unique'=>'This Skill Is Already Exists.',
                
        'nameAr.string'=>'Format Not Matching.',
        'nameAr.unique'=>'This Skill Is Already Exists.',
       ]);

       if($valid->fails()){
        return back()->withErrors($valid)->withInput($req->all());
       }

       $skill  = SkillMdl::create([
        'name_en'=>$req->nameEn,
        'name_ar'=>$req->nameAr,
        ]);

       //SKILL HISTORY
       SkillHistoryMdl::create([
        'skill_id'=>$skill->id,
        'user_id'=>Auth::user()->id,
        'action'=>'Added To System By '.Auth::user()->name,
        ]);
    
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Add New Skill '.$skill->name_en,
        ]);

        Toastr()->success('Skill Added Successfully.', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(SkillMdl $skill)
    {
         $skill::find($skill);

        return view('admin.skill.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(SkillMdl $skill)
    {
        $skill::find($skill);

        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'skillId'=>'required|numeric|exists:skills,id',
            'nameEn'=>'required|string|unique:skills,name_en,'.$req->skillId,
            'nameAr'=>'nullable|string|unique:skills,name_ar,'.$req->skillId,
           ],[
            'nameEn.required'=>'English Name Is Required.',
            'nameEn.string'=>'Format Not Matching.',
            'nameEn.unique'=>'This Skill Is Already Exists.',
                    
            'nameAr.string'=>'Format Not Matching.',
            'nameAr.unique'=>'This Skill Is Already Exists.',
           ]);
    
           if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
           }
    
          $skill = SkillMdl::find($req->skillId);
          $skill->name_en = $req->nameEn;
          $skill->name_ar = $req->nameAr;
          $skill->save();          
    
           //SKILL HISTORY
           SkillHistoryMdl::create([
            'skill_id'=>$skill->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Updated By '.Auth::user()->name,
            ]);
        
            //USER ACTIVITY        
            UserActivityMdl::create([
                'user_id'=>Auth::user()->id,
                'action' =>'Update Skill '.$skill->name_en,
            ]);

            Toastr()->success('Skill Updated Successfully.', 'Success');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(),[
            'skillID'=>'required|numeric|exists:skills,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }
    
          $skill = SkillMdl::find($req->skillID);
    
           //SKILL HISTORY
           SkillHistoryMdl::create([
            'skill_id'=>$skill->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Deleted By '.Auth::user()->name,
            ]);
        
            //USER ACTIVITY        
            UserActivityMdl::create([
                'user_id'=>Auth::user()->id,
                'action' =>'Delete Skill '.$skill->name_en,
            ]);

            $skill->delete();

            Toastr()->success('Skill Deleted Successfully.', 'Success');
            return back();
    }
    /**
     * Restore the specified resource.
     *
     * @param  int  $skill
     * @return \Illuminate\Http\Response
     */
    public function restore($skill)
    {
        $skill=SkillMdl::withTrashed()->find($skill);
        
        $skill->restore();

         //SKILL HISTORY
           SkillHistoryMdl::create([
            'skill_id'=>$skill->id,
            'user_id'=>Auth::user()->id,
            'action'=>'Restored  By '.Auth::user()->name,
        ]);
        
        //USER ACTIVITY        
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Restore Skill '.$skill->name_en,
        ]);

        Toastr()->success('Skill Restored Successfully.', 'Success');
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
            'skillID'=>'required|numeric|exists:skills,id',
        ]);

        if($valid->fails()){
            Toastr()->error('Please Try Again Later.', 'Error');
            return back()->withInput($req->all());
        }
        
        $skill = SkillMdl::withTrashed()->find($req->skillID);
       
         //SERVICE HISTORY
         $actions = SkillHistoryMdl::where('skill_id',$skill->id)->get();
         foreach($actions as $action){
            $action->forceDelete();
         }
         
        
        //USER ACTIVITY      
        UserActivityMdl::create([
            'user_id'=>Auth::user()->id,
            'action' =>'Delete Skill '.$skill->name_en.' From System' ,
        ]);
        $skill->forceDelete();

        Toastr()->success('Skill Deleted Successfully.', 'Success');
        return back();     
    }
}