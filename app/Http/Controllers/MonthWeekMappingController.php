<?php

namespace App\Http\Controllers;

use App\Models\MonthWeekMapping;
use Illuminate\Http\Request;

class MonthWeekMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MonthWeekMapping::all();
        $title = 'Month Week Mapping Master';
        return view('six_app.month-week-mappings.index',compact('data','title'));
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
        $this->validate($request, [
            'month' => 'required|unique:month_week_mappings,month',
        ]);
        $datas = $request->all();
        unset($datas['_token']);
        $data = new MonthWeekMapping();
        $data::create($datas);
        return redirect()->back()
                    ->withStatus('Data added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonthWeekMapping  $monthWeekMapping
     * @return \Illuminate\Http\Response
     */
    public function show(MonthWeekMapping $monthWeekMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonthWeekMapping  $monthWeekMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthWeekMapping $monthWeekMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonthWeekMapping  $monthWeekMapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'month' => 'required|unique:month_week_mappings,month,'.$id,
        ]);
        $datas = $request->all();
        unset($datas['_token']);
        unset($datas['_method']);
        $data = MonthWeekMapping::find($id);
        $data->update($datas);
        return redirect()->back()
                    ->withStatus('Data updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthWeekMapping  $monthWeekMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthWeekMapping $monthWeekMapping)
    {
        //
    }
}
