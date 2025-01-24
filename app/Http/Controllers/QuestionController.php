<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\FieldType;
use App\Models\Type;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Question::all();
        $field_type_data = FieldType::where('status',1)->get()->pluck('name','id')->toArray();
        $category = QuestionCategory::where('status',1)->get()->pluck('name','id')->toArray();
        $type = Type::where('status',1)->get()->pluck('name','id')->toArray();
        $title = 'Question';
        return view('six_app.questions.index',compact('data','title','field_type_data','category','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Question::all();
        $field_type_data = FieldType::where('status',1)->get()->pluck('name','id')->toArray();
        $category = QuestionCategory::where('status',1)->get()->pluck('name','id')->toArray();
        $type = Type::where('status',1)->get()->pluck('name','id')->toArray();
        $title = 'Question Create Form';
        return view('six_app.questions.create',compact('data','title','field_type_data','category','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');
        // $this->validate($request, [
        //     'desc' => 'required|unique:types,name',
        // ]);
        $datas = $request->all();
        $datas['options'] = json_encode($datas['option'],true);
        unset($datas['_token']);
        $data = new Question();
        $data::create($datas);
        return redirect()->url('questions.index')
                    ->withStatus('Data added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $val = Question::find($id);
        $field_type_data = FieldType::where('status',1)->get()->pluck('name','id')->toArray();
        $category = QuestionCategory::where('status',1)->get()->pluck('name','id')->toArray();
        $type = Type::where('status',1)->get()->pluck('name','id')->toArray();
        $title = 'Question Update Form';
        return view('six_app.questions.edit',compact('val','title','field_type_data','category','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $datas = $request->all();
        unset($datas['_token']);
        unset($datas['_method']);
        $datas['options'] = json_encode($datas['option'],true);
        $data = Question::find($id);
        $data->update($datas);
        return redirect()->route('questions.index')
                    ->withStatus('Data updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try
        {
            $data = Question::find($id);
            $data->delete();
            return redirect()->back()
                    ->withStatus('Data deleted Successfully!');
        }catch (\Exception $e) {
            return back()->withErrors(__($e->getMessage()));
        }
    }
}
