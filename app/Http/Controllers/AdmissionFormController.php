<?php

namespace App\Http\Controllers;

use App\Models\AdmissionForm;
use App\Models\FeesPayment;
use App\Models\Contact;
use Illuminate\Http\Request;
use File;

class AdmissionFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AdmissionForm::all();
        $title = 'Admission Form';
        return view('admission_forms.index',compact('data','title'));
    }

    

    public function payment(){
        $data = FeesPayment::orderBy('id','DESC')->get();
        $title = 'Fee Data';
        return view('fees_payments',compact('data','title'));
    }

    public function contact(){
        $data = Contact::orderBy('id','DESC')->get();
        $title = 'Contact Data';
        return view('contact',compact('data','title'));
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
            'name' => 'required|unique:admission_forms,name',
        ]);
        $datas = $request->all();
        unset($datas['_token']);
        $data = new AdmissionForm();
        $data->name = $request->name;
        $data->status = $request->status;
        if ($request->file('url_name')) {
            $path='/uploads/new';
            $user_file=$request->file('url_name');
            $photo = $this->profile_photo($user_file,$path);
            $data->url_name = $photo;
        }
        $data->save();
        return redirect()->back()
                    ->withStatus('Data added Successfully!');
    }

    public function profile_photo($user_file,$paths){
        $path = public_path().$paths;
        if (!file_exists($path)) 
        {
            File::makeDirectory($paths, $mode = 0777, true, true);
        }
        $user_file_path = $path.'-'.$user_file->getClientOriginalName();
        $filename = $user_file->getClientOriginalName();
        $file_path = $path.$filename;    
        $file=$user_file;
        $file->move($path,$filename);
        $path_table=$paths.'/'.$filename;
        return $path_table;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdmissionForm  $AdmissionForm
     * @return \Illuminate\Http\Response
     */
    public function show(AdmissionForm $AdmissionForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdmissionForm  $AdmissionForm
     * @return \Illuminate\Http\Response
     */
    public function edit(AdmissionForm $AdmissionForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdmissionForm  $AdmissionForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:admission_forms,name,'.$id,
        ]);
        $datas = $request->all();
        unset($datas['_token']);
        unset($datas['_method']);
        $data = AdmissionForm::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        if ($request->file('url_name')) {
            $path='/uploads/'.($data->id);
            $user_file=$request->file('url_name');
            $photo = $this->profile_photo($user_file,$path);
            $data->url_name = $photo;
        }
        $data->save();
        return redirect()->back()
                    ->withStatus('Data updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdmissionForm  $AdmissionForm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $data = AdmissionForm::find($id);
            $data->delete();
            return redirect()->back()
                    ->withStatus('Data deleted Successfully!');
        }catch (\Exception $e) {
            return back()->withErrors(__($e->getMessage()));
        }
    }
}
