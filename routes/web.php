<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\Home2Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OperationidController;
use App\Http\Controllers\TaskmanagerController;
use App\Http\Controllers\TimerController;
use App\Models\Taskmanager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'prevent-back-history'],function(){


Route::get('/', [HomeController::class,'index'])->name('index')->middleware('LoginCheck');

Route::get('/login', [HomeController::class,'login'])->name('login');
Route::post('/login/submit', [HomeController::class,'login_sub'])->name('log_sub');

Route::get('/logout', [HomeController::class,'logout'])->name('logOut');

Route::post('/register/submit', [HomeController::class,'reg_store'])->name('reg_sub');

Route::get('/leaving_application', [LeaveController::class,'index'])->name('lea_app')->middleware('Admin');
Route::post('/leaving_application/reject', [LeaveController::class,'deleteapp'])->name('del_app')->middleware('Admin');
Route::post('/leaving_application/accept', [LeaveController::class,'acceptapp'])->name('acceptapp')->middleware('Admin');
Route::get('/short/leave', [LeaveController::class,'shortleave'])->name('shortleavead')->middleware('Admin');

Route::get('/view_data', [DataController::class,'viewdata'])->name('viewdata')->middleware('Admin');
// Route::get('/view_data/view_more', [DataController::class,'viewmore'])->name('viewmore');
Route::get('/view_data/view_more/{id}', [DataController::class,'viewmore'])->name('viewmore')->middleware('Admin');
Route::get('/view_data/view_more/shortleaves/{id}', [DataController::class,'viewshortmore'])->name('viewshortmore')->middleware('Admin');

Route::get('/monthly_leaves', [DataController::class,'monleav'])->name('monleav')->middleware('Admin');
Route::post('/monthly_leaves/separes_months', [DataController::class,'sermonstore'])->name('sermon')->middleware('Admin');

Route::get('/employee', [Home2Controller::class,'index'])->name('indexemp')->middleware('Employee');
Route::get('/employee/leaving_application/form', [Home2Controller::class,'form'])->name('leavappform')->middleware('Employee');
Route::post('/employee/leaving_application/form_submit', [Home2Controller::class,'store'])->name('app_sub')->middleware('Employee');
Route::get('/employee/view_mytotalleaves', [Home2Controller::class,'viewmyleaves'])->name('viewmyleave')->middleware('Employee');
Route::get('/view/application/update', [Home2Controller::class,'viewappupdate'])->name('viewappupdate')->middleware('Employee');
Route::get('/employee/short/leaves', [Home2Controller::class,'shortleave'])->name('shortleave')->middleware('Employee');
Route::post('/employee/leaving_application/short_leave/form_submit', [Home2Controller::class,'short_leave'])->name('shortapp_sub')->middleware('Employee');

Route::get('/employees/opearion', [OperationidController::class,'views'])->name('operationemployee')->middleware('Admin');
Route::post('/employees/opearion/id/delete', [OperationidController::class,'delempid'])->name('delempid')->middleware('Admin');
Route::post('/employees/opearion/id/edit', [OperationidController::class,'editempid'])->name('editempid')->middleware('Admin');

Route::post('/chnage_password/submit', [Home2Controller::class,'changepw_store'])->name('changepw_sub');

Route::post('/notice', [NoticeController::class,'store'])->name('addnots')->middleware('Admin');


Route::post('/end_timer', [TimerController::class,'end'])->name('endtimer');
Route::post('/timer_start', [TimerController::class,'store'])->name('timersub');

Route::get('/timer', [TimerController::class,'page'])->name('timetracking')->middleware('Admin');
// Route::get('/timer/delete/{id}', [TimerController::class,'delete'])->name('timertradel')->middleware('Admin');
Route::post('/timer/filter/date', [TimerController::class,'filter'])->name('timerfilter')->middleware('Admin');

Route::get('/task_manager', [TaskmanagerController::class,'page'])->name('taskmanager')->middleware('Employee');
Route::post('/task_manager/task/submit', [TaskmanagerController::class,'store'])->name('tasksub');

Route::get('/task_status/show/{id}', [TaskmanagerController::class,'showtaskstatus'])->name('taskstatus');

Route::post('/save/changes/task', [TaskmanagerController::class,'savech'])->name('savechanges');
Route::post('/task/delete', [TaskmanagerController::class,'deltask'])->name('deltask');



Route::get('/fullcalender', [FullCalenderController::class,'index'])->middleware('Admin')->name('fullcale');

Route::get('/employee/fullcalender', [FullCalenderController::class,'view'])->name('fullcaleemp')->middleware('Employee');

Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

Route::get('/fullcalender/employee/leaving_application/form', [FullCalenderController::class,'form'])->middleware('Employee');

});
