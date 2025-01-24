<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\AdmissionFormController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\FieldTypeController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\QuestionCategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\MonthWeekMappingController;
use App\Http\Controllers\AuditorMappingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuditCardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/send-test-mail', function () {
    $data = [
        'name' => 'John Doe',
        'message' => 'This is a test email sent without creating separate files.'
    ];

    Mail::send([], [], function ($message) use ($data) {
        $message->to('itsanil1996@gmail.com') // Recipient's email
            ->subject('Test Mail')          // Email subject
            ->setBody("
                <h1>Hello, {$data['name']}!</h1>
                <p>{$data['message']}</p>
            ", 'text/html');                 // Email body in HTML
    });

    return 'Test email sent!';
});

Route::post('/handle-payment', [PaymentController::class, 'handlePayment']);

Route::get('/terms', function () {
    $title = 'Terms & Conditions';
    return view('terms',compact('title'));
});

Route::get('/', function () {
    // return redirect('login');
    // return view('pdf');
    return view('web.index');
});

Route::get('/about-us', function () {
    return view('web.about-us');
});

Route::get('/index', function () {
    return view('web.index');
});

Route::get('/payment_success', function () {
    return view('web.payment_success');
});

Route::get('/activities', function () {
    return view('web.activities');
});

Route::get('/payment', function () {
    return view('web.payment');
});

Route::get('/gallery', function () {
    return view('web.gallery');
});

Route::get('/contact', function () {
    return view('web.contact');
});



Route::get('/index-video', function () {
    return view('web.index-video');
});


Route::post('/pdf/extract', [PDFController::class, 'extractText']);
Route::post('conatct-data', [HomeController::class, 'data']);
Route::post('form', [HomeController::class, 'form']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::post('/socity-login', [LoginController::class, 'socityLogin'])->name('socity-login');
  
Route::group(['middleware' => ['auth','role:SuperAdmin']], function() {
    Route::resource('notice', NoticeController::class);
    Route::resource('gallary', GallaryController::class);
    Route::resource('admission-form', AdmissionFormController::class);
    Route::resource('subscription', SubscriptionController::class);
    Route::get('fees-payment', [AdmissionFormController::class, 'payment']);
    Route::get('contacts', [AdmissionFormController::class, 'contact']);

    Route::resource('plant', PlantController::class);
    Route::resource('application', ApplicationController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('type', TypeController::class);
    Route::resource('field-type', FieldTypeController::class);
    Route::resource('question-category', QuestionCategoryController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('score', ScoreController::class);
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('six-users', UsersController::class);
    Route::post('/email-templates-update/{id}', [SuggestionController::class, 'emailTemplateUpdate']);
    Route::post('/save-setting', [HomeController::class, 'SavesettingData']);
    Route::get('/setting', [HomeController::class, 'setting']);
});



