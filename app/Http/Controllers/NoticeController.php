<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NoticeController extends Controller
{
    public function store(Request $request)
    {
        $datas = Notice::updateOrCreate([
            'id' => $request->id,
        ],[
            'notice' => $request->notice,
        ]);

        $details = [
            'title' => 'Notice From Cubezytech',
            'body' => 'Notice Update '.$request->notice,
        ];
        
        if($request->notice != null){
            $totals = User::all();
            foreach($totals as $total){
                $em = $total->email;
                Mail::to($em)->send(new \App\Mail\MyTestMail($details));
            }
        }

        return redirect()->back();
    }
}
