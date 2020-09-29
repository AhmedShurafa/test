<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions;
use App\Http\Controllers\Controller;

use App\Models\Education;
use App\Models\Experience;
use App\Models\M_Skill;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edu   = Education::all();
        $exp   = Experience::all();
        $skill = Skill::all();
        $more  = M_Skill::all();

        return view('admin.resume',compact(['edu','exp','skill','more']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resume_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (($request->N_edu !== null)) {
            $edu = new Education();
            $edu->create([
                'title' => $request->N_edu,
                'title_ar' => $request->N_edu_ar,
                'year' => $request->Y_edu,
                'company' => $request->C_edu,
                'company_ar' => $request->C_edu_ar,
                'description' => $request->D_edu,
                'description_ar' => $request->D_edu_ar,
                'user_id' => Auth::id(),
            ]);
        }
        if (($request->N_exp !== null)) {
            $exp = new Experience();
            $exp->create([
                'title' => $request->N_exp,
                'title_ar' => $request->N_exp_ar,
                'year' => $request->Y_exp,
                'company' => $request->C_exp,
                'company_ar' => $request->C_exp_ar,
                'description' => $request->D_exp,
                'description_ar' => $request->D_exp_ar,
                'user_id' => Auth::id(),
            ]);
        }
        if (($request->Job_name !== null)) {
            $skill = new Skill();
            $skill->create([
                'name'      => $request->Job_name,
                'name_ar'   => $request->Job_name_ar,
                'value'     => $request->Job_val,
                'user_id' => Auth::id(),
            ]);
        }
        if (($request->More_name !== null)) {
            $mSkill = new M_Skill();
            $mSkill->create([
                'name'      => $request->More_name,
                'name_ar'   => $request->More_name_ar,
                'value'     => $request->More_val,
                'user_id'   => Auth::id(),
            ]);
        }
        return redirect(route('admin.resume'))->with('success',' .تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function Education($id)
    {
        $edu = Education::find($id);
        return view('admin.resume_edit')->with('edu',$edu);
    }
    public function delEducation($id)
    {
        $edu = Education::find($id);
        $edu->delete();
        return redirect(route('admin.resume'))->with('error','تم حذف العنصر.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function Experiences($id)
    {
        $Exp = Experience::find($id);
        return view('admin.resume_edit')->with('Exp',$Exp);
    }
    public function deleExperiences($id)
    {
        $Exp = Experience::find($id);
        $Exp->delete();
        return redirect(route('admin.resume'))->with('error','تم حذف العنصر.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if (isset($request->N_edu)){
            $Edu = Education::find($id);
            $Edu->update([
                'title' => $request->N_edu,
                'title_ar' => $request->N_edu_ar,
                'year' => $request->Y_edu,
                'company' => $request->C_edu,
                'company_ar' => $request->C_edu_ar,
                'description' => $request->D_edu,
                'description_ar' => $request->D_edu_ar,
            ]);
            $Edu->save();
        }elseif (isset($request->N_exp)){

            $Exp = Experience::find($id);
            $Exp->update([
                'title'       => $request->N_exp,
                'title_ar'    => $request->N_exp_ar,
                'year'        => $request->Y_exp,
                'company'     => $request->C_exp,
                'company_ar'  => $request->C_exp_ar,
                'description' => $request->D_exp,
                'description_ar' => $request->D_exp_ar,
                'user_id'     => Auth::id(),
            ]);
            $Exp->save();
        }elseif (isset($request->Job_name)){

            $Skill = Skill::find($id);
            $Skill->update([
                'Job_name' => $request->More_name,
                'Job_name_ar' => $request->More_name_ar,
                'Job_val' => $request->More_val,
                'user_id' => Auth::id(),
            ]);
            $Skill->save();
        }else{
            $more = M_Skill::find($id);
            $more->update([
                'name'    => $request->More_name,
                'name_ar' => $request->More_name_ar,
                'value'   => $request->More_val,
                'user_id' => Auth::id(),
            ]);
            $more->save();
        }
        return redirect(route('admin.resume'))->with('success','تم التعديل بنجاح.');

    }

    /**
     * display the specified resource from storage.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function Skills($id)
    {
        $skill = Skill::find($id);
        return view('admin.resume_edit')->with('skill',$skill);
    }
    public function deleSkills($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect(route('admin.resume'))->with('error','تم حذف العنصر.');
    }

    public function More($id)
    {
        $M_skill = M_Skill::find($id);
        return view('admin.resume_edit')->with('M_skill',$M_skill);
    }
    public function deleMore($id)
    {
        $M_skill = M_Skill::find($id);
        $M_skill->delete();
        return redirect(route('admin.resume'))->with('error','تم حذف العنصر.');
    }
}
