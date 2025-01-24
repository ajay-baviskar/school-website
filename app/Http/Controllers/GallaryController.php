<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Image::all();
        $title = 'Gallary';
        $url = 'gallary';
        return view('gallary.index',compact('data','title','url'));
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
        $request->validate([
            'photo' => 'required|mimes:jpeg,jpg,png', // Accepts JPEG, JPG, PNG, and PDF files up to 2MB
        ]);

        if ($request->photo) {
            $data = new Image();
            $path='/uploads';
            $user_file=$request->file('photo');
            $photo = $this->profile_photo($user_file,$path);
            $data->name = $photo;
            $data->status = $request->status;
            $data->year = $request->year;
            $data->save();
        }
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
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Image::find($id);
        if ($request->photo) {
            $path='/uploads';
            $user_file=$request->file('photo');
            $photo = $this->profile_photo($user_file,$path);
            $data->name = $photo;
            
        }
        $data->status = $request->status;
        $data->year = $request->year;
        $data->save();
        return redirect()->back()
                    ->withStatus('Data updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $data = Image::find($id);
            $data->delete();
            return redirect()->back()
                    ->withStatus('Data deleted Successfully!');
        }catch (\Exception $e) {
            return back()->withErrors(__($e->getMessage()));
        }
    }
}
