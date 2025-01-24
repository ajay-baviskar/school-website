<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plant;
use App\Models\Department;
use App\Models\Application;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::user()->hasRole('SuperAdmin')) {
            return redirect()->back()->withStatus('Data updated Successfully!');
            // echo "<pre>"; print_r('No Access'); echo "</pre>"; die('');
        }
        $data = User::orderBy('id','DESC')->get();
        $title= 'User';
        return view('users.index',compact('data','title'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasRole('SuperAdmin')) {
            return redirect()->back();
            // echo "<pre>"; print_r('No Access'); echo "</pre>"; die('');
        }
        $title= 'Add User';
        $roles = Role::where('app_id',0)->pluck('name','name')->all();
        $plant_data = Plant::pluck('name','id')->all();
        $department_data = Department::pluck('name','id')->all();
        $application_data = Application::pluck('name','id')->all();
        return view('users.create',compact('roles','title','plant_data','department_data','application_data'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'user_name' => 'required|unique:users,user_name',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['location_id'] = json_encode($input['location_id'],true);
        $input['department_id'] = json_encode($input['department_id'],true);
        $input['app_id'] = json_encode($input['app_id'],true);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $userRole = $user->roles->pluck('name','name')->all();
        $title= 'Edit User';
         $roles = Role::all()->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole','title'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'user_name' => 'required|unique:users,user_name,'.$id,
            'password' => 'same:confirm-password',
            // 'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        // echo "<pre>"; print_r($input); echo "</pre>"; die('anil');
        $user = User::find($id);
        $user->update($input);
        $role_data = Role::where('name',$request->input('roles'))->first();
        if ($role_data) {
            $model_has_roles = DB::table('model_has_roles')->where('model_id',$id)->where('app',0)->first();
            if ($model_has_roles) {
                DB::table('model_has_roles')->where('model_id',$id)->where('app',0)->update(
                    [
                        'role_id'=>$role_data->id,
                    ]
                );
            }else{
                DB::table('model_has_roles')->insert(
                    [
                        'role_id'=>$role_data->id,
                        'model_type'=>'App\Models\User',
                        'model_id'=>$id,
                        'app'=>0,
                    ]
                );
            }
            // $six_user = SixUser::where('user_id',$id)->first();
            // $six_user->role_id = $role_data->id;
            // $six_user->save();
        }
        // DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        // $user->assignRole($request->input('roles'));
        
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function uploaduser(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        $rows = Excel::toArray([],$request->file('file'))[0];
        unset($rows[0]);
        foreach ($rows as $key => $value) {
            if ($value[0] != '' && $value[1] != '' && $value[2] != '') {
                // $user_datas = false;
                $user_data = User::where('user_name',$value[1])->first();
                if (empty($user_data)) {
                    // $user_datas = true;
                    $user_data = new User();
                    $user_data->name = $value[0];
                    $user_data->email = $value[2];
                    $user_data->user_name = $value[1];
                    $user_data->password = Hash::make('admin@123$');
                    $user_data->location_id = json_encode([4],true);
                    $user_data->department_id = json_encode([4],true);
                    $user_data->app_id = json_encode([1],true);
                    $user_data->save();
                    $user_data->assignRole('Zone User');
                }else{
                    $user_data->name = $value[0];
                    $user_data->email = $value[2];
                    $user_data->save();
                }
            }
        }
        return redirect()->route('users.index')
                    ->withStatus('Data Imported Successfully');
    }

    public function downloadSample()
    {
        $unitNumbers = [];
        return Excel::download(new SampleExport($unitNumbers), 'sample.xlsx');
    }
}

class SampleExport implements FromArray, WithHeadings, WithEvents
{
    use RegistersEventListeners;
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return ['Name',
                'User Name',
                'Email',
            ];
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $sheet = $event->sheet->getDelegate();

    //             for ($row = 2; $row <= count($this->data) + 1; $row++) {
    //                 $validation = $sheet->getCell("N{$row}")->getDataValidation();
    //                 $validation->setType(DataValidation::TYPE_LIST);
    //                 $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
    //                 $validation->setAllowBlank(false);
    //                 $validation->setShowInputMessage(true);
    //                 $validation->setShowErrorMessage(true);
    //                 $validation->setShowDropDown(true);
    //                 $validation->setFormula1('"Yes,No"');

    //                 $validation1 = $sheet->getCell("O{$row}")->getDataValidation();
    //                 $validation1->setType(DataValidation::TYPE_LIST);
    //                 $validation1->setErrorStyle(DataValidation::STYLE_INFORMATION);
    //                 $validation1->setAllowBlank(false);
    //                 $validation1->setShowInputMessage(true);
    //                 $validation1->setShowErrorMessage(true);
    //                 $validation1->setShowDropDown(true);
    //                 $validation1->setFormula1('"Yes,No"');
    //             }
    //         },
    //     ];
    // }
}