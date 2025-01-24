<?php

namespace App\Http\Controllers;

use App\Models\AuditCard;
use App\Models\MonthWeekMapping;
use App\Models\AuditorMapping;
use App\Models\Question;
use App\Models\User;
use App\Models\QuestionCategory;

use Illuminate\Http\Request;
use Auth;
use DB;

class AuditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AuditCard::all();
        // $data = AuditCard::where('auditor_user_id',Auth::user()->id)->get();
        $title = 'Audit Card List';
        // echo "<pre>"; print_r($data); echo "</pre>"; die('anil');
        return view('six_app.audit-card.index',compact('data','title'));
        // echo "<pre>"; print_r($data); echo "</pre>"; die('anil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add AuditCard';
        $current_date = date('Y-m-d');
        $current_month = date('Y-m');

        return view('six_app.audit-card.create',compact('title'));
        // return view('audit-card.create');
    }

    public function getData(Request $request){
        $current_date = $request->date;
        $current_month = date('Y-m',strtotime($current_date));
        $get_month_data = MonthWeekMapping::where('month',$current_month)->first();
        $champion_user_id = Auth::user()->id;
        $AuditorMapping = AuditorMapping::where('champion_user_id',Auth::user()->id)->where('month',$current_month)->first();
        if (empty($get_month_data) || empty($AuditorMapping)) {
            return  '<center>
                        <strong class="text-danger not_mapped">Selected Date is not configured in Audit Card Mapping</strong>
                    </center>';
        }
        $type = '';
        $auditor_id = '';
        if ($current_date >= $get_month_data->w1_start && $current_date <= $get_month_data->w1_end) {
            $type = 'w1';
            $auditor_id = $AuditorMapping->w1_auditor_id;
        }
        if ($current_date >= $get_month_data->w2_start && $current_date <= $get_month_data->w2_end) {
            $type = 'w2';
            $auditor_id = $AuditorMapping->w2_auditor_id;
        }
        if ($current_date >= $get_month_data->w3_start && $current_date <= $get_month_data->w3_end) {
            $type = 'w3';
            $auditor_id = $AuditorMapping->w3_auditor_id;
        }
        if ($current_date >= $get_month_data->w4_start && $current_date <= $get_month_data->w4_end) {
            $type = 'w4';
            $auditor_id = $AuditorMapping->w4_auditor_id;
        }
        if ($current_date >= $get_month_data->w5_start && $current_date <= $get_month_data->w5_end) {
            $type = 'w5';
            $auditor_id = $AuditorMapping->w5_auditor_id;
        }
        if ($type == '' || $auditor_id == '' || $auditor_id == NULL) {
            return  '<center>
                        <strong class="text-danger not_mapped">Selected Date is not configured in Audit Card Mapping</strong>
                    </center>';
        }else{
            $AuditCard = AuditCard::where('date',$current_date)->where('champion_user_id',$champion_user_id)->first();
            $cat_id_assigned_to_user = [];
            $q_id_assigned_to_user = [];
            $questions_data = [];
            if ($AuditCard) {
                $q_id = [];
                $questions_data = json_decode($AuditCard->questions_data,true);
                // echo "<pre>"; print_r($questions_data); echo "</pre>"; die('anil');

                foreach ($questions_data as $value) {
                    $q_id[] = $value['id'];
                }
                $q_data = Question::select('department_id','id','cat_id')->whereIn('id',$q_id)->get();
                foreach ($q_data as $q_datas) {
                    $cat_id_assigned_to_user[] = $q_datas->cat_id;
                    $q_id_assigned_to_user[] = $q_datas->id;
                }
            } else {
                $user_department_id = json_decode(Auth::user()->department_id,true);
                $q_data = Question::select('department_id','id','cat_id')->where('status',1)->get();
                foreach ($q_data as $q_datas) {
                $q_department = json_decode($q_datas->department_id,true);
                    if (array_intersect($q_department, $user_department_id)) {
                        $cat_id_assigned_to_user[] = $q_datas->cat_id;
                        $q_id_assigned_to_user[] = $q_datas->id;
                    }
                }
            }
            $cat_id_assigned_to_user = array_unique($cat_id_assigned_to_user);
            $q_id_assigned_to_user = array_unique($q_id_assigned_to_user);
            $q_cat_data = QuestionCategory::whereIn('id',$cat_id_assigned_to_user)->get();
            foreach ($q_cat_data as $key => $value) {
                $q_cat_data[$key]->questions = Question::whereIn('id',$q_id_assigned_to_user)->where('cat_id',$value->id)->where('status',1)->get();
            }
            if ($q_cat_data->count() == 0) {
                return  '<center>
                        <strong class="text-danger not_mapped">No Question is assigned for your department.</strong>
                    </center>';
            }
            return view('six_app.audit-card.form',compact('q_cat_data','auditor_id','AuditCard','champion_user_id','questions_data'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $AuditCard = AuditCard::where('date',$request->date)->where('champion_user_id',$request->champion_user_id)->first();
        $questions_data = $request->questions_data;
        if (empty($AuditCard)) {
            $AuditCard = new AuditCard();
            $AuditCard->champion_user_id = $request->champion_user_id;
            $AuditCard->date = $request->date;
            foreach ($questions_data as $key => $value) {
                $questions_data[$key]['score_given_by_auditor'] = $value['score_given_by_champion'];
            }
            // echo "<pre>"; print_r($questions_data); echo "</pre>"; die('anil');
        }
        $AuditCard->auditor_user_id = $request->auditor_id;
        $total_score_given_by_champion = array_sum(array_column($questions_data, 'score_given_by_champion'));
        $AuditCard->total_score = $total_score_given_by_champion;
        $AuditCard->questions_data = json_encode($questions_data,true);
        $AuditCard->save();
        return redirect()->back()
                    ->withStatus('Data added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuditCard  $auditCard
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $AuditCard = AuditCard::find($id);
        $cat_id_assigned_to_user = [];
        $q_id_assigned_to_user = [];
        $questions_data = [];
        if ($AuditCard) {
            $q_id = [];
            $questions_data = json_decode($AuditCard->questions_data,true);
            $observation = json_decode($AuditCard->observation,true);
            // echo "<pre>"; print_r($questions_data); echo "</pre>"; die('anil');

            foreach ($questions_data as $value) {
                $q_id[] = $value['id'];
            }
            $q_data = Question::select('department_id','id','cat_id')->whereIn('id',$q_id)->get();
            foreach ($q_data as $q_datas) {
                $cat_id_assigned_to_user[] = $q_datas->cat_id;
                $q_id_assigned_to_user[] = $q_datas->id;
            }
        }
        $cat_id_assigned_to_user = array_unique($cat_id_assigned_to_user);
        $q_id_assigned_to_user = array_unique($q_id_assigned_to_user);
        $q_cat_data = QuestionCategory::whereIn('id',$cat_id_assigned_to_user)->get();
        foreach ($q_cat_data as $key => $value) {
            $q_cat_data[$key]->questions = Question::whereIn('id',$q_id_assigned_to_user)->where('cat_id',$value->id)->where('status',1)->get();
        }
        $title = 'AuditCard Details';
        $owner_users = DB::table('model_has_roles')->where('role_id',8)->get()->pluck('model_id')->toArray();
        $owner_data = User::whereIn('id',$owner_users)->where('status',1)->get();
        return view('six_app.audit-card.auditor_form',compact('q_cat_data','AuditCard','questions_data','title','owner_data','observation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuditCard  $auditCard
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditCard $auditCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuditCard  $auditCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditCard $auditCard)
    {
        // echo "<pre>"; print_r($request->all()); echo "</pre>";
        //  die('anil');
        $questions_data = $request->questions_data;
        $observation = $request->observation;
        $total_score_given_by_champion = array_sum(array_column($questions_data, 'score_given_by_auditor'));
        $auditCard->total_score = $total_score_given_by_champion;
        $auditCard->status = $request->status;
        $auditCard->questions_data = json_encode($questions_data,true);
        $auditCard->observation = json_encode($observation,true);
        $auditCard->save();
        return redirect('audit-card')
                    ->withStatus('Data added Successfully!');
        echo "<pre>"; print_r($auditCard); echo "</pre>";
        echo "<pre>"; print_r($request->all()); echo "</pre>";
         die('anil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuditCard  $auditCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditCard $auditCard)
    {
        //
    }
}
