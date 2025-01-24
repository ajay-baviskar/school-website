<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Application;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\Contact;
use DB;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function data(Request $request){
        $subscription = new Subscription();
        $subscription->email = $request->EMAIL;
        $subscription->save();
        $data = [
            'name' => 'Test',
            'message' => $request->EMAIL
        ];

        Mail::send([], [], function ($message) use ($data) {
            $message->to('info@sharadaenglishhighschool.in') // Recipient's email
            // $message->to('info@sharadaenglishhighschool.in') // Recipient's email
                ->subject('Subscription Details')          // Email subject
                ->setBody("
                    <p>Email :{$data['message']}</p>
                ", 'text/html');                 // Email body in HTML
        });
        return redirect()->back()
                    ->withStatus('Data added Successfully!');
        echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');
    }

    public function form(Request $request){
        $subscription = new Contact();
        $subscription->name = $request->name;
        $subscription->email = $request->email;
        $subscription->subject = $request->subject;
        $subscription->remark = $request->message;
        $subscription->save();
        $data = [
            'name' => 'Test',
            'message' => 'Name : ' .$_POST['name']."<br/><br/>"
                .'Email : ' .$_POST['email'] ."<br/><br/>"
               .'Subject : ' .$_POST['subject'] ."<br/><br/>"
               .'Message : ' .$_POST['message'] ."<br/><br/>",
        ];

        Mail::send([], [], function ($message) use ($data) {
            $message->to('info@sharadaenglishhighschool.in') // Recipient's email
                ->subject('Conatct Details')          // Email subject
                ->setBody("
                    <p>Eamil:{$data['message']}</p>
                ", 'text/html');                 // Email body in HTML
        });
        return redirect()->back()
                    ->withStatus('Data added Successfully!');
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');
    }

    public function setting(){
        $title = 'Fee Deatils';
        $setting = Setting::where('name','fee')->first();
        return view('setting.form',compact('title','setting'));
        echo "<pre>"; print_r('asdads'); echo "</pre>"; die('anil');
    }

    public function SavesettingData(Request $request){
        $setting = Setting::where('name','fee')->first();
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');
        if (empty($setting)) {
            $setting = new Setting();
            $setting->name = 'fee';
        }
        $setting->fee_data = $request->desc;
        $setting->contact_data = $request->contact_data;
        $setting->x_link = $request->x_link;
        $setting->meta_link = $request->meta_link;
        $setting->youtube_link = $request->youtube_link;
        $setting->facebook_link = $request->facebook_link;
        $setting->save();
         return redirect()->back()
                    ->withStatus('Data added Successfully!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = 'Dashboard';
        if (Auth::user()->hasRole('SuperAdmin')) {
            return view('dashboard',compact('title'));
            return redirect('application');
        }
        if (isset($request->app_id)) {
            Session::put('app_id', $request->app_id); // Store data in session
        }
        
        // 
        // Session::forget('app_id'); // Remove data from session
        $app_id = Session::get('app_id'); // Retrieve data from session
        if (empty($app_id)) {
            $application_data = Application::where('status',1)->get();
            $title = 'Application';
            return view('app_select',compact('application_data','title'));
        }
        if ($app_id == 1) {
            if (Auth::user()->hasRole('Zone User')) {
                return redirect('suggestion');
            }
            
            return view('home',compact('title'));
        }else{
            return view('six_app.home',compact('title'));
        }
        
        // $data = Society::all();
        
    }

  
}
