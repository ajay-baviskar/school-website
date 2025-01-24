<?php

namespace App\Http\Controllers;

use App\Models\AuditorMapping;
use App\Models\MonthWeekMapping;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class AuditorMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MonthWeekMapping::all();
        $title = 'Manage Auditor Mapping';
        return view('six_app.auditor-mapping.index',compact('data','title'));
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
    public function store(Request $request)
    {
        try {
            $data = $request->all()['data'];
            $AuditorMapping = AuditorMapping::where('champion_user_id',$data['user_id'])->where('month',$data['month'])->first();
            if (empty($AuditorMapping)) {
                $AuditorMapping = new AuditorMapping();
                $AuditorMapping->champion_user_id= $data['user_id'];
                $AuditorMapping->month= $data['month'];
            }
            $AuditorMapping->plant_id= $data['location_id'];
            $AuditorMapping->department_id= $data['department_id'];
            $AuditorMapping->w1_auditor_id= $data['w1_auditor_id'];
            $AuditorMapping->w2_auditor_id= $data['w2_auditor_id'];
            $AuditorMapping->w3_auditor_id= $data['w3_auditor_id'];
            $AuditorMapping->w4_auditor_id= $data['w4_auditor_id'];
            $AuditorMapping->w5_auditor_id= $data['w5_auditor_id'];
            $AuditorMapping->save();
            return response()->json(['msg'=>'Updated successfully'],200);
        } catch (Exception $e) {
            return response()->json(['msg'=>$e->getMessage()],500);
        }
        
        // echo "<pre>"; print_r($data); echo "</pre>"; die('anil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuditorMapping  $auditorMapping
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $month = $request->month;
        $champion_users = DB::table('model_has_roles')->where('role_id',6)->get()->pluck('model_id')->toArray();
        $auditor_users = DB::table('model_has_roles')->where('role_id',7)->get()->pluck('model_id')->toArray();
        $user_data = User::whereIn('id',$champion_users)->where('status',1)->get();
        $auditor_data = User::whereIn('id',$auditor_users)->where('status',1)->get();
        return view('six_app.auditor-mapping.mapping',compact('user_data','month','auditor_data'));
        echo "<pre>"; print_r($user_data); echo "</pre>"; die('anil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuditorMapping  $auditorMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditorMapping $auditorMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuditorMapping  $auditorMapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditorMapping $auditorMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuditorMapping  $auditorMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditorMapping $auditorMapping)
    {
        //
    }
}
