<?php

namespace App\Http\Controllers;

use App\Models\Timer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimerController extends Controller
{
    public function store()
    {

        $chec = Timer::where('user_id', auth()->user()->id)->where('timerend', 'Running')->get();

        if ($chec->isEmpty()) {
            $mytime = Carbon::now();
            $timerstart = $mytime->toDateTimeString();

            $uid = auth()->user()->id;

            $dt = Carbon::today(); 
            $dat = date('d-m-Y', strtotime($dt));

            $data = Timer::create([
                'user_id' => $uid,
                'date' => $dat,
                'timerstart' => $timerstart,
                'timerend' => 'Running',
                'timerstartenddiff' => '00:00:00',
                'timerrecordtime' => '00:00:00',
                'status' => '1',
            ]);
        }

        return true;
    }

    public function end(Request $request)
    {
        $h = $request->tim['h'];
        $m = $request->tim['m'];
        $s = $request->tim['s'];
        $ti = sprintf("%02d", $h) . ":" . sprintf("%02d", $m) . ":" . sprintf("%02d", $s);

        $running = Timer::where('user_id', auth()->user()->id)->where('status', '1')->first();

        $mytime = Carbon::now();
        $timerend = $mytime->toDateTimeString();
        $sttime = $running->timerstart;
        $diff = $mytime->diffInSeconds($sttime);
        $timerstartenddiff = gmdate('H:i:s', $diff);

        $running->status = '0';
        $running->timerend = $timerend;
        $running->timerrecordtime = $ti;
        $running->timerstartenddiff = $timerstartenddiff;
        $running->save();

        return true;
    }

    public function page()
    {
        $dt = Carbon::today();
        $dat = date('d-m-Y', strtotime($dt));

        $data = Timer::with('use')->where('status','0')->where('date', $dat)->orderBy('timerstart','DESC')->get();
        $i = 1;
        return view('timerpage',compact('data','i'));
    }

    public function filter(Request $request)
    {
        $sertimer = $request->sertimer;
        $setsertimer = date('d-m-Y', strtotime($sertimer));
        $data = Timer::with('use')->where('status','0')->where('date', $setsertimer)->orderBy('timerstart','DESC')->get();
       
        $i = 1;
        return view('filtertimerpage',compact('data','i','setsertimer'));

    }
}
