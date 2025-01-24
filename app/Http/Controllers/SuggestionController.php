<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use App\Models\Type;
use App\Models\User;
use App\Models\Plant;
use App\Models\Score;
use App\Models\Department;
use App\Models\SuggestionData;
use App\Models\FeedbackData;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Auth;
use File;
use DB;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboardData()
    {
        // $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->get();
        // foreach ($data as $key => $value) {
        //     if (empty($value->getSuggestionData)) {
        //         Suggestion::find($value->id)->delete();
        //     }
        //     // echo "<pre>"; print_r(); echo "</pre>"; die('anil');
        // }
        $data = [];
        
        if (Auth::user()->hasRole('Plant Coordinator')) {
            $user_suggestion = Suggestion::select('id')->where(function($query) {
                $query->whereJsonContains('coardinator1', Auth::user()->id)
                      ->orWhere('coardinator2', Auth::user()->id)
                      ->orwhere('created_by', Auth::user()->id);
            })->get()->pluck('id')->toArray();
            // $user_suggestion = Suggestion::select('id')->whereJsonContains('coardinator1', Auth::user()->id)->orwhere('created_by', Auth::user()->id)->orwhere('coardinator2', Auth::user()->id)->get()->pluck('id')->toArray();
        }else{
            $user_suggestion = Suggestion::select('id')->where(function($query) {
                $query->whereIn('department_id', json_decode(Auth::user()->department_id, true))
                      ->orWhere('hod1', Auth::user()->id)
                      ->orwhere('created_by', Auth::user()->id);
            })->get()->pluck('id')->toArray();
            // $user_suggestion = Suggestion::select('id')->whereIn('department_id',json_decode(Auth::user()->department_id,true))->orwhere('created_by', Auth::user()->id)->get()->pluck('id')->toArray();
        }

        // Get count of suggestions by type
        $data['type_wise'] = Suggestion::join('types', 'suggestions.type_id', '=', 'types.id')
            ->select('types.name', Suggestion::raw('count(*) as total'))
            ->whereIn('suggestions.id',$user_suggestion)
            ->groupBy('types.name')
            ->pluck('total', 'types.name');

        $data['location_wise'] = Suggestion::join('plants', 'suggestions.plant_id', '=', 'plants.id')
            ->select('plants.name', Suggestion::raw('count(*) as total'))
            ->whereIn('suggestions.id',$user_suggestion)
            ->groupBy('plants.name')
            ->pluck('total', 'plants.name');

        // Get count of suggestions by department
        $data['department_wise'] = Suggestion::join('departments', 'suggestions.department_id', '=', 'departments.id')
            ->select('departments.name', Suggestion::raw('count(*) as total'))
            ->whereIn('suggestions.id',$user_suggestion)
            ->groupBy('departments.name')
            ->pluck('total', 'departments.name');

        // Get count of suggestions by priority
        $data['priority_wise'] = Suggestion::join('suggestion_datas', 'suggestions.id', '=', 'suggestion_datas.suggestion_id')
            ->select('suggestion_datas.priority', Suggestion::raw('count(*) as total'))
            ->whereIn('suggestions.id',$user_suggestion)
            ->groupBy('suggestion_datas.priority')
            ->pluck('total', 'suggestion_datas.priority');
        // $data['priority_wise'] = Suggestion::select('priority', SuggestionData::raw('count(*) as total'))
        //     ->groupBy('priority')
        //     ->pluck('total', 'priority');

        // Get count of suggestions by status
        $data['status_wise'] = Suggestion::select('status', Suggestion::raw('count(*) as total'))
            ->whereIn('suggestions.id',$user_suggestion)
            ->groupBy('status')
            ->pluck('total', 'status');

        // Get count of suggestions by status
        $data['score_wise'] = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')
            ->whereIn('suggestions.id',$user_suggestion)
            ->orderBy('feedback_score','DESC')
            ->get();

        // echo "<pre>"; print_r($data['type_wise']); echo "</pre>"; die('anil');

        
        return response()->json($data);
    }

    public function emailTemplate(Request $request){
        $data = EmailTemplate::all();
        $title = 'Email Template';
        return view('email_templates.index',compact('data','title'));
        echo "<pre>"; print_r($email_datas); echo "</pre>"; die('anil');
    }

    public function emailTemplateUpdate(Request $request,$id){
        $email_data = EmailTemplate::find($id);
        $email_data->head_text = $request->head_text;
        $email_data->footer_text = $request->footer_text;
        $email_data->save();
        return redirect()->back()
                    ->withStatus('Data updated Successfully!'); 
    }

    public function topScore(){
        if (Auth::user()->hasRole('Plant Coordinator')) {
            $user_suggestion = Suggestion::select('id')->whereJsonContains('coardinator1', Auth::user()->id)->orwhere('created_by', Auth::user()->id)->orwhere('coardinator2', Auth::user()->id)->get()->pluck('id')->toArray();
        }else{
            $user_suggestion = Suggestion::select('id')->where('created_by', Auth::user()->id)->orwhere('hod1', Auth::user()->id)->get()->pluck('id')->toArray();
        }
        $score_wise = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')
            ->whereIn('suggestions.id',$user_suggestion)
            ->orderBy('feedback_score','DESC')
            ->get();
        $title = 'Score Wise Data';
        return view('score_wise',compact('score_wise','title'));
    }
    public function getData(){
        $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where('created_by', Auth::user()->id);
        if (Auth::user()->hasRole('Zone User')) {
            $created_data = $data->orderBy('id','DESC')->get()->filter(function ($item) {
                return !empty($item->getSuggestionData);
            });
            $done_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where('created_by', Auth::user()->id)->where('status','Closed')->orderBy('id','DESC')->get();
            return response()->json(compact('done_data','created_data'));
            // return response()->json($data);
        }
        // $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereJsonContains('coardinator1', Auth::user()->id)->get();
        if (Auth::user()->hasRole('HOD')) {
            
            $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where(function($query) {
                $query->whereIn('department_id', json_decode(Auth::user()->department_id, true))
                      ->orWhere('hod1', Auth::user()->id);
            })->orderBy('id','DESC');

            // For all data
            $all_data = $data->clone()->orwhere('created_by', Auth::user()->id)->get()->toArray();

            // For open data (in-progress)
            $open_data = $data->clone()->whereNotIn('status', ['Closed', 'Reject'])->get()->toArray();

            // For assigned data
            $assigned_data = $data->clone()->whereIn('status',['Approve','In-Progress'])->get()->toArray();

            $closed_data = $data->clone()->whereIn('status',['Closed','Reject'])->get()->toArray();
            // $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereIn('id', $suggestion_data_id)->whereIn('department_id',json_decode(Auth::user()->department_id,true))->orderBy('id','DESC')->get();
            // $data1 = $data;
            // $in_progress_data = array_values($data1->whereNotIn('status',['Closed','Reject'])->toArray());//open data
            // $assigned_data = array_values($data1->whereIn('status',['Approve','In-Progress'])->toArray());
            // $implement_data = array_values($data1->toArray());//all data
            // $hold_data = array_values($data1->whereIn('status',['Closed','Reject'])->toArray());//closed data
            // $pointed_data = array_values($data1->where('status','Pointed')->toArray());
            // $created_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereIn('id', $suggestion_data_id)->where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
            $created_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
            return response()->json(compact('assigned_data','all_data','closed_data','open_data','created_data'));
        }
        if (Auth::user()->hasRole('Plant Coordinator')) {
            $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where(function($query) {
                $query->whereJsonContains('coardinator1', Auth::user()->id)
                      ->orWhere('coardinator2', Auth::user()->id);
            })->orderBy('id','DESC');

            // $data1 = $data;
            $all_data = $data->clone()->orwhere(function($query) {
                $query->where('created_by', Auth::user()->id);
            })->get()->toArray();
            // echo "<pre>"; print_r($all_data); echo "</pre>"; die('anil');
            // For open data (in-progress)
            $open_data = $data->clone()->where(function($query) {
                $query->whereNotIn('status', ['Closed', 'Reject']);
            })->get()->toArray();

            // For assigned data
            $assigned_data = $data->clone()->whereIn('status',['Assigned','Implement'])->get()->toArray();

            $closed_data = $data->clone($assigned_data)->where(function($query) {
                $query->whereIn('status',['Closed','Reject']);
            })->get()->toArray();

            // $in_progress_data = array_values($data1->whereNotIn('status',['Closed','Reject'])->toArray());//open data
            // $assigned_data = array_values($data1->whereIn('status',['Assigned','Implement'])->toArray());
            // $implement_data = array_values($data1->toArray());//all data
            // $hold_data = array_values($data1->whereIn('status',['Closed','Reject'])->toArray());
            // $pointed_data = array_values($data1->where('status','Pointed')->toArray());
            $created_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
            return response()->json(compact('assigned_data','all_data','closed_data','open_data','created_data'));
            // return response()->json(compact('assigned_data','created_data','done_data'));
        }
        
        $assigned_data = $data->where('status','Assigned');
        $done_data = $data->where('status','!=','Assigned');
        $data = Suggestion::where('created_by', Auth::user()->id)->get();

        return response()->json($done_data);
    }
    public function index()
    {
        $data = [];
        $app_id = Session::get('app_id'); // Retrieve data from session
        if (empty($app_id)) {
            return redirect('home');
        }
        $title = 'Suggestion';
        $location_id = json_decode(Auth::user()->location_id,true);
        // $plant_data = Plant::where('status',1)->whereIn('id',$location_id)->pluck('name','id')->all();
        $plant_data = Plant::whereIn('id',$location_id)->get()->pluck('name','id');
        $department_data = Department::all()->pluck('name','id');
        $type_data = Type::all()->pluck('name','id');
        if (Auth::user()->hasRole('HOD')) {
            return view('suggestion.admin',compact('title','plant_data','type_data','department_data'));
        }
        if (Auth::user()->hasRole('Plant Coordinator')) {
            return view('suggestion.admin',compact('title','plant_data','type_data','department_data'));
        }
        if (Auth::user()->hasRole('Zone User')) {
            $data = Suggestion::where('created_by', Auth::user()->id)->get();
        }
        if (Auth::user()->hasRole('HOD')) {
            $data = Suggestion::all();
        }
        
        
        
        return view('suggestion.index',compact('data','title','plant_data','type_data','department_data'));

        
    }

    public function applyFilters(Request $request)
    {
        $query = Suggestion::query();
        // if (Auth::user()->hasRole('Plant Coordinator')) {
        //     $data_id = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->select('id')->whereJsonContains('coardinator1', Auth::user()->id)->orwhereJsonContains('coardinator2', Auth::user()->id)->orderBy('id','DESC')->get()->pluck('id')->toArray();
        //     $query->whereIn('id', $data_id);
        // }
        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        if ($request->filled('plant_id')) {
            $query->where('plant_id', $request->plant_id);
        }

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }

        if ($request->filled('priority')) {
            $suggestion_data_id = SuggestionData::select('suggestion_id')->where('priority', $request->priority)->get()->pluck('suggestion_id')->toArray();
            // $query->whereIn('id', $suggestion_data_id);
        }

        if ($request->filled('sug_status')) {
            $query->where('status', $request->sug_status);
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        if (isset($suggestion_data_id)) {
            $query->whereIn('id', $suggestion_data_id);
        }

        if ($request->filled('sort_by') && $request->filled('order_by')) {
            $query->orderBy($request->sort_by, $request->order_by);
        } else {
            $query->orderBy('feedback_score', 'asc');
        }

        

        
        $suggestion_data_id = $query->get()->pluck('id')->toArray();
        if (Auth::user()->hasRole('Zone User')) {
            $suggestion_data_id = $query->get()->pluck('id')->toArray();
            $created_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where('created_by', Auth::user()->id)->whereIn('id', $suggestion_data_id)->orderBy('id','DESC')->get();
            $done_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where('created_by', Auth::user()->id)->whereIn('id', $suggestion_data_id)->where('status','Closed')->orderBy('id','DESC')->get();
            return response()->json(compact('done_data','created_data'));
        }
        
        if (Auth::user()->hasRole('Plant Coordinator')) {
            // $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereIn('id', $suggestion_data_id)->orderBy('id','DESC')->get();
            // $data1 = $data;
            // $in_progress_data = array_values($data1->whereNotIn('status',['Closed','Reject'])->toArray());//open data
            // $assigned_data = array_values($data1->whereIn('status',['Assigned','Implement'])->toArray());
            // $implement_data = array_values($data1->toArray());//all data
            // $hold_data = array_values($data1->whereIn('status',['Closed','Reject'])->toArray());
            // $pointed_data = array_values($data1->where('status','Pointed')->toArray());
            // $assigned_data = $data->where('status','Approve');
            // $implement_data = $data->where('status','Implement');
            // $hold_data = $data->where('status','On-Hold');
            // $in_progress_data = $data->where('status','In-Progress');
            // $pointed_data = $data->where('status','Pointed');
            $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereIn('id', $suggestion_data_id)->where(function($query) {
                $query->whereJsonContains('coardinator1', Auth::user()->id)
                      ->orWhere('coardinator2', Auth::user()->id);
            })->orderBy('id','DESC');

            // $data1 = $data;
            $all_data = $data->clone()->orwhere(function($query) {
                $query->where('created_by', Auth::user()->id);
            })->get()->toArray();
            // echo "<pre>"; print_r($all_data); echo "</pre>"; die('anil');
            // For open data (in-progress)
            $open_data = $data->clone()->where(function($query) {
                $query->whereNotIn('status', ['Closed', 'Reject']);
            })->get()->toArray();

            // For assigned data
            $assigned_data = $data->clone()->whereIn('status',['Assigned','Implement'])->get()->toArray();

            $closed_data = $data->clone($assigned_data)->where(function($query) {
                $query->whereIn('status',['Closed','Reject']);
            })->get()->toArray();
            $created_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where('created_by', Auth::user()->id)->whereIn('id', $suggestion_data_id)->orderBy('id','DESC')->get();
            return response()->json(compact('all_data','open_data','assigned_data','closed_data','created_data'));
            
            // $assigned_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereJsonContains('coardinator1', Auth::user()->id)->where('status','Assigned')->whereIn('id', $suggestion_data_id)->orderBy('id','DESC')->get();
            // $done_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereJsonContains('coardinator1', Auth::user()->id)->whereIn('id', $suggestion_data_id)->orderBy('id','DESC')->get();
            // $created_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->where('created_by', Auth::user()->id)->whereIn('id', $suggestion_data_id)->orderBy('id','DESC')->get();
            // return response()->json(compact('assigned_data','created_data','done_data'));
        }

        if (Auth::user()->hasRole('HOD')) {
            // echo "<pre>"; print_r($suggestion_data_id); echo "</pre>"; die('anil');
            // $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereIn('id', $suggestion_data_id)->whereIn('department_id',json_decode(Auth::user()->department_id,true))->orderBy('id','DESC')->get();
            // $data1 = $data;
            // $in_progress_data = array_values($data1->whereNotIn('status',['Closed','Reject'])->toArray());//open data
            // $assigned_data = array_values($data1->whereIn('status',['Approve','In-Progress'])->toArray());
            // $implement_data = array_values($data1->toArray());//all data
            // $hold_data = array_values($data1->whereIn('status',['Closed','Reject'])->toArray());//closed data
            // $pointed_data = array_values($data1->where('status','Pointed')->toArray());
            

            $data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereIn('id', $suggestion_data_id)->where(function($query) use ($suggestion_data_id) {
                $query->whereIn('department_id', json_decode(Auth::user()->department_id, true))
                      ->orWhere('hod1', Auth::user()->id);
            })->orderBy('id','DESC');
            // For all data
            $all_data = $data->clone()->orwhere('created_by', Auth::user()->id)->get()->toArray();
            // For open data (in-progress)
            $open_data = $data->clone()->whereNotIn('status', ['Closed', 'Reject'])->get()->toArray();
            // For assigned data
            $assigned_data = $data->clone()->whereIn('status',['Approve','In-Progress'])->get()->toArray();
            $closed_data = $data->clone()->whereIn('status',['Closed','Reject'])->get()->toArray();
            $created_data = Suggestion::with('getSuggestionData','getCreatedBy','getDepartment','getPlant','getType','getFeedbackData')->whereIn('id', $suggestion_data_id)->where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
            return response()->json(compact('all_data','open_data','assigned_data','closed_data','created_data'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Suggestion';
        $user = Auth::user();
        $location_id = json_decode($user->location_id,true);
        $plant_data = Plant::where('status',1)->whereIn('id',$location_id)->pluck('name','id')->all();
        $department_data = Department::where('status',1)->pluck('name','id')->all();
        $type_data = Type::where('status',1)->pluck('name','id')->all();
        $images = array();
        return view('suggestion.create',compact('title','plant_data','type_data','department_data','images'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getCoadinator($location_id,$department_id){
        $coardinator_user = DB::table('model_has_roles')->where('role_id',3)->pluck('model_id')->toArray();
        $coardinator_users = User::whereIn('id',$coardinator_user)->get();
        $coardinator_user_id = [];
        // $coardinator_id = User::where('location_id')
        $employee_location = [$location_id];
        $employee_department = [$department_id];
        foreach ($coardinator_users as $coardinator_users_value) {
            $coardinator_location = json_decode($coardinator_users_value->location_id,true);
            $coardinator_department = json_decode($coardinator_users_value->department_id,true);
            $coardinator_locations = array_intersect($coardinator_location,$employee_location);
            $coardinator_departments = array_intersect($coardinator_department,$employee_department);
            if (count($coardinator_locations) > 0 && count($coardinator_departments) > 0) {
                $coardinator_user_id[] = $coardinator_users_value->id;
            }
        }
        return $coardinator_user_id;
    }

    public function store(Request $request)
    {
        // echo "<pre>"; print_r($request->all()); echo "</pre>";
        // echo "<pre>"; print_r($this->getCoadinator($request->plant_id,$request->department_id)); echo "</pre>";
        //  die('anil');

        $request->validate([
            'type_id' => 'required',
            'plant_id' => 'required',
            'department_id' => 'required',
            'due_date' => 'required',
            'desc' => 'required',
            'img' => 'mimes:jpeg,jpg,png,pdf', // Accepts JPEG, JPG, PNG, and PDF files up to 2MB
            // 'img_desc' => 'required',
            'priority' => 'required',
            'title' => 'required|string|max:255',
        ]);
        $suggestion = new Suggestion();
        $suggestion->type_id = $request->type_id;
        $suggestion->plant_id = $request->plant_id;
        $suggestion->department_id = $request->department_id;
        $suggestion->due_date = $request->due_date;
        $suggestion->created_by = Auth::user()->id;
        $suggestion->coardinator1 = json_encode($this->getCoadinator($request->plant_id,$request->department_id),true);
        
        $suggestion->save();
        
        $suggestion_data = new SuggestionData;
        $suggestion_data->suggestion_id = $suggestion->id;
        $suggestion_data->title = $request->title;
        $suggestion_data->desc = $request->desc;
        $suggestion_data->priority = $request->priority;
        $suggestion_data->img_desc = $request->img_desc;
        $suggestion_data->save();
        $img_data = [];
        if ($request->img) {
            foreach ($request->img as $key => $user_file) {
                $path='/uploads/suggesion/'.($suggestion->id).'/'.$key;
                $img = $this->profile_photo($user_file,$path);
                $img_data[] = $img;
            }
            $suggestion_data->img = json_encode($img_data,true);
            $suggestion_data->save();
        }
        // if (Auth::user()->hasRole('Zone User')) {
            $users = User::whereIn('id',$this->getCoadinator($request->plant_id,$request->department_id))->get();
            // $users = User::whereIn('id',Auth::user()->getCoadinator())->get();
            foreach ($users as $user) {
                $subject = "#".$suggestion->id." - New ticket assigned!";
                $this->sendEMail($subject,$suggestion,$user,'assigned');
            }
        // }
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');

        return redirect('suggestion')
                    ->withStatus('Data added Successfully!');

    }


    public function sendEMail($subject,$suggestion,$user,$email_path){
        $mail = \Mail::send('mail.'.$email_path,compact('suggestion','user'),function($message) use ($suggestion,$user,$subject){
            // $message->to($user->email);
            $message->to([$user->email]);
            $message->subject($subject);
        });
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
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        if (isset($_GET['send_email'])) {
            if ($suggestion->status != 'Closed') {
                $coardinator1 = json_decode($suggestion->coardinator1,true);
                if ($coardinator1) {
                    $users = User::whereIn('id',$coardinator1)->get();
                    foreach ($users as $user) {
                        $subject = "Reminder for ticket #".$suggestion->id." on Sahyoug Portal";
                        $this->sendEMail($subject,$suggestion,$user,'reminder');
                    }
                }
            }
            return redirect()->back()
                    ->withStatus('Email sended Successfully!');
        }
        
        $title = 'Suggestion Details';
        $hod_user = DB::table('model_has_roles')->where('role_id',2)->pluck('model_id')->toArray();
        $hod_users = User::whereIn('id',$hod_user)->get()->pluck('name','id');
        $score_data = Score::where('status',1)->get();
        if (Auth::user()->hasRole('HOD')) {
            $getCoadinator = $suggestion->getCreatedBy->getCoadinator();
            if (@$suggestion->getFeedbackData->getCoardinator) {
                $hod_users = User::where('id',$suggestion->getFeedbackData->getCoardinator->id)->get()->pluck('name','id');
            }else{
                $hod_users = User::whereIn('id',$getCoadinator)->get()->pluck('name','id');
            }
            
            return view('suggestion.admin_show',compact('suggestion','title','hod_users','score_data'));
        }else{
            
            $hod_users = User::whereIn('id',Auth::user()->getHOD())->get()->pluck('name','id');
            return view('suggestion.show',compact('suggestion','title','hod_users','score_data'));
        }
        
        echo "<pre>"; print_r($suggestion); echo "</pre>"; die('anil');
    }

    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        if(count($request->score_id) == 0){
            return redirect()->back()
                    ->withStatus('Score is mandatory!');
        }
        // dd($request->score_id);
        if(isset($request->score_id)){
            $score_data = Score::whereIn('id',$request->score_id)->sum('score');
            $suggestion->feedback_score = $score_data;
        }
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');
        // $suggestion = Suggestion::find($suggestion->id);
        $suggestion->status = $request->status;
        if (Auth::user()->hasRole('Plant Coordinator')) {
            $suggestion->hod1 = $request->hod1;
            $suggestion->date_of_completion = $request->date_of_completion;
        }else{
            if ($request->coardinator2) {
                $suggestion->coardinator2 = $request->coardinator2;
            }
            $suggestion->target_date = $request->target_date;
        }
        $suggestion->save();
        $FeedbackData = FeedbackData::where('suggestion_id',$suggestion->id)->first();
        if (empty($FeedbackData)) {
            $FeedbackData = new FeedbackData();
            $FeedbackData->suggestion_id = $suggestion->id;
        }
        if (Auth::user()->hasRole('Plant Coordinator')) {
            $FeedbackData->feedback_text1 = $request->feedback_text1;
            if (isset($request->closing_remark)) {
                $FeedbackData->closing_remark = $request->closing_remark;
            }
            $FeedbackData->feedback_given_by1 = Auth::user()->id;
        }else{
            $FeedbackData->feedback_text2 = $request->feedback_text2;
            $FeedbackData->feedback_given_by2 = Auth::user()->id;
        }
        if(isset($request->score_id)){
            $FeedbackData->score_id = json_encode($request->score_id,true);
        }
        $FeedbackData->save();
        if (!Auth::user()->hasRole('Plant Coordinator')) {
            if ($request->status == 'Implement') {
                $user = User::where('id',$request->coardinator2)->first();
                if ($user) {
                    $subject = "#".$suggestion->id." - New ticket implemented!";
                    $this->sendEMail($subject,$suggestion,$user,'implement');
                }
            }
            // if ($request->status == 'In-Progress') {
            //     $users = User::where('id',$request->coardinator2)->get();
            //     foreach ($users as $user) {
            //         $subject = "#".$suggestion->id." - New ticket implemented!";
            //         $this->sendEMail($subject,$suggestion,$user,'implemented');
            //     }
            // }
        }else{
            if ($request->status == 'Approve' && Auth::user()->hasRole('Plant Coordinator')) {
                $user = $suggestion->getCreatedBy;
                $subject = "#".$suggestion->id." - Your ticket has been Approved!";
                $this->sendEMail($subject,$suggestion,$user,'approve_zoneuser');
                $users = User::where('id',$request->hod1)->get();
                foreach ($users as $user) {
                    $subject = "#".$suggestion->id." - New ticket assigned!";
                    $this->sendEMail($subject,$suggestion,$user,'approve_hod');
                }
            }
            if ($request->status == 'Reject' && Auth::user()->hasRole('Plant Coordinator')) {
                $user = $suggestion->getCreatedBy;
                $subject = "#".$suggestion->id." - Your ticket has been Rejected!";
                $this->sendEMail($subject,$suggestion,$user,'reject');
            }
            if ($request->status == 'Closed' && Auth::user()->hasRole('Plant Coordinator')) {
                $user = $suggestion->getCreatedBy;
                $subject = "#".$suggestion->id." - Your ticket has been Closed!";
                $this->sendEMail($subject,$suggestion,$user,'closed');
                $users = User::where('id',$request->hod1)->get();
                foreach ($users as $user) {
                    $subject = "#".$suggestion->id." - has been Closed!";
                    $this->sendEMail($subject,$suggestion,$user,'closed_hod');
                }
            }
        }
        return redirect('suggestion')
                    ->withStatus('Data updated Successfully!');

        // feedback_score
        echo "<pre>"; print_r($suggestion); echo "</pre>"; 
        echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $suggestion)
    {
        //
    }
}
