<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\LeaveappShort;
use App\Models\LeaveRecord;
use App\Models\LeavingApplication;
use App\Models\Notice;
use App\Models\Timer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Psy\CodeCleaner\LeavePsyshAlonePass;

class Home2Controller extends Controller
{
    public function index(Request $request)
    {
        $userprofile = User::find(auth()->user()->id);
        $tot = $userprofile->total_leaves;
        $nots = Notice::all();

        return view('indexemp',compact('tot','nots','userprofile'));
    }

    public function form()
    {
        $userprofile = User::find(auth()->user()->id);
        return view('appform',compact('userprofile'));
    }

    public function shortleave()
    {
        $appups = LeaveappShort::where('email',auth()->user()->email)->orderBy('date','DESC')->get();
        $i=1;
        $userprofile = User::find(auth()->user()->id);

        return view('shortleave',compact('appups','i','userprofile'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        if($request->day == 'Half-Day'){
            $validator = Validator::make($request->all(), [
                'day' => 'required',
                'date' => 'required',
                'reason' => 'required',
                'half' => 'required',
            ],[
                'day.required' => 'Select The Day',
                'date.required' => 'Select The Date',
                'reason.required' => 'Please Select The Reason',
                'half.required' => 'Please Select The Half',
            ]);

            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }

            if($request->reasonother != null){
                $data = LeavingApplication::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'day' => $request->day."($request->half)",
                    'from' => $request->date,
                    'to' => $request->date,
                    'total_days' => '0.5',
                    'reason' => $request->reasonother,
                ]);
            }else{
                $data = LeavingApplication::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'day' => $request->day."($request->half)",
                    'from' => $request->date,
                    'to' => $request->date,
                    'total_days' => '0.5',
                    'reason' => $request->reason,
                ]);
            }

            $details = [
                'title' => 'Leave Application',
                'body' => 'Received Leave Application From Employees ' .$data->name .' on date ' .$data->from .' to ' .$data->to .' total ' . $data->total_days .' days '
            ];

            Mail::to('savan.cubezy@gmail.com')->send(new \App\Mail\MyTestMail($details));
        }else{
            $validator = Validator::make($request->all(), [
                'day' => 'required',
                'from' => 'required',
                'to' => 'required',
                'totaldays' => 'required',
                'reason' => 'required',
            ],[
                'day.required' => 'Select The Day',
                'from.required' => 'Select The Date of From',
                'to.required' => 'Select The Date Of To',
                'totaldays.required' => 'Enter The Total Days',
                'reason.required' => 'Please Select The Reason',
            ]);

            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }

            if($request->reasonother != null){
                $data = LeavingApplication::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'day' => $request->day,
                    'from' => $request->from,
                    'to' => $request->to,
                    'total_days' => $request->totaldays,
                    'reason' => $request->reasonother,
                ]);
            }else{
                $data = LeavingApplication::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'day' => $request->day,
                    'from' => $request->from,
                    'to' => $request->to,
                    'total_days' => $request->totaldays,
                    'reason' => $request->reason,
                ]);
            }

            $details = [
                'title' => 'Leave Application',
                'body' => 'Received Leave Application From Employees ' .$data->name .' on date ' .$data->from .' to ' .$data->to .' total ' . $data->total_days .' days '
            ];

            Mail::to('savan.cubezy@gmail.com')->send(new \App\Mail\MyTestMail($details));
        }

        // $message = 'Received Leave Application From Employees Please Check';
        // $uid = '1';

        // event(new \App\Events\StatusLiked($message,$uid));

        return true;
    }

    public function short_leave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'hours' => 'required',
            'reason' => 'required',
        ],[
            'day.required' => 'Select The Day',
            'from.required' => 'Select The Date of From',
            'to.required' => 'Select The Date Of To',
            'totaldays.required' => 'Enter The Total Days',
            'reason.required' => 'Please Select The Reason',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        if($request->reasonother != null){
            $data = LeaveappShort::create([
                'name' => $request->name,
                'email' => $request->email,
                'date' => $request->date,
                'from' => $request->from,
                'to' => $request->to,
                'total_hours' => $request->hours,
                'reason' => $request->reasonother,
            ]);
        }else{
            $data = LeaveappShort::create([
                'name' => $request->name,
                'email' => $request->email,
                'date' => $request->date,
                'from' => $request->from,
                'to' => $request->to,
                'total_hours' => $request->hours,
                'reason' => $request->reason,
            ]);
        }

        $details = [
            'title' => 'Leave Application Update',
            'body' => 'Received Short Leave Application From Employees ' .$data->name .' on date ' .$data->date . ' hours ' .$data->from . ' to ' .$data->to . ' total hours ' .$data->total_hours
        ];

        Mail::to('savan.cubezy@gmail.com')->send(new \App\Mail\MyTestMail($details));

        return true;
    }

    public function viewmyleaves()
    {
        $leaves = LeaveRecord::where('user_id',auth()->user()->id)->orderBy('leave_datefrom','asc')->get();
        $i=1;
        $userprofile = User::find(auth()->user()->id);
        return view('viewmytotalleaves',compact('leaves','i','userprofile'));
    }

    public function viewappupdate()
    {
        $appups = LeavingApplication::where('email',auth()->user()->email)->get();
        $i=1;
        $userprofile = User::find(auth()->user()->id);
        return view('viewappupdate',compact('appups','i','userprofile'));
    }

    public function changepw_store(Request $request)
    {
        $validate = $request->validate([
            'oldpw' => 'required',
            'password' => 'required',
            'confpw' => 'required|same:password',
        ],[
            'oldpw.required' => 'Please Enter The Old Password',
            'password.required' => 'Please Enter The New Password',
            'confpw.required' => 'Please Enter The confirm Password',
            'confpw.same' => 'Please New Password And Confirm Password Must Match..!',
        ]);

        if(Hash::check($request->oldpw,auth()->user()->password)){
            $updpw = Hash::make($request->confpw);
        }else{
            return redirect()->back()->with('ERROR','Your Old Password Is Wrong..!');
        }

        $use = User::find(auth()->user()->id);
        $use->password = $updpw;
        $use->save();

        return redirect()->back()->with('SUCCESS','Your Passwrod Changed Successfully..!');
    }
}
