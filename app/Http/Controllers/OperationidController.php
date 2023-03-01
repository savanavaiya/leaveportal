<?php

namespace App\Http\Controllers;

use App\Models\LeaveRecord;
use App\Models\LeavingApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OperationidController extends Controller
{
    public function views()
    {
        $datas = User::where('user_type','employee')->get();
        $i=1;
        return view('operationid',compact('datas','i'));
    }

    public function delempid(Request $request)
    {

        $delempid = User::where('id',$request->id)->delete();

        $appdelempid = LeavingApplication::where('email',$request->email)->delete();

        $recdelempid = LeaveRecord::where('user_id',$request->id)->delete();

        return true;
    }

    public function editempid(Request $request)
    {
        $editdata = User::find($request->id);
        
        return $editdata;
    }
}
