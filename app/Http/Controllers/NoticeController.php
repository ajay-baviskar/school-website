<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use App\Models\Notice;
use Illuminate\Http\Request;
use File;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Notice::all();
        $title = 'Notice';
        $url = 'notice';
        return view('notice.index',compact('data','title','url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:departments,name',
        // ]);

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        unset($datas['_token']);
        $data = new Notice();
        if ($request->file('url_name')) {
            $path='/uploads/new';
            $user_file=$request->file('url_name');
            $photo = $this->profile_photo($user_file,$path);
            $datas['url_name'] = $photo;
        }
        $data::create($datas);
        return redirect()->back()
                    ->withStatus('Data added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datas = $request->all();
        unset($datas['_token']);
        $data = Notice::find($id);
        if ($request->file('url_name')) {
            $path='/uploads/new';
            $user_file=$request->file('url_name');
            $photo = $this->profile_photo($user_file,$path);
            $datas['url_name'] = $photo;
        }
        $data->update($datas);
        return redirect()->back()
                    ->withStatus('Data updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $data = Notice::find($id);
            $data->delete();
            return redirect()->back()
                    ->withStatus('Data deleted Successfully!');
        }catch (\Exception $e) {
            return back()->withErrors(__($e->getMessage()));
        }
    }


    public function index1()
{
    $notices = Notice::latest()->paginate(10);
    $holidays = Holiday::orderBy('holiday_date', 'asc')->get();

    return view('notice.notice_page', compact('notices', 'holidays'));
}



}
