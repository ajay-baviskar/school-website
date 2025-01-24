<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class QuestionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = QuestionCategory::all();
        $title = 'Question Category';
        return view('six_app.question-category.index',compact('data','title'));
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
            'name' => 'required|unique:question_category,name',
        ]);
        $datas = $request->all();
        unset($datas['_token']);
        $data = new QuestionCategory();
        $data::create($datas);
        return redirect()->back()
                    ->withStatus('Data added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionCategory  $questionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionCategory $questionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionCategory  $questionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionCategory $questionCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionCategory  $questionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:question_category,name,'.$id,
        ]);
        $datas = $request->all();
        unset($datas['_token']);
        unset($datas['_method']);
        $data = QuestionCategory::find($id);
        $data->update($datas);
        return redirect()->back()
                    ->withStatus('Data updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionCategory  $questionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $data = QuestionCategory::find($id);
            $data->delete();
            return redirect()->back()
                    ->withStatus('Data deleted Successfully!');
        }catch (\Exception $e) {
            return back()->withErrors(__($e->getMessage()));
        }
    }
}