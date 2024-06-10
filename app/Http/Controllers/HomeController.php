<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\LeavingApplication;
use App\Models\Member;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $empl = User::where('user_type', 'employee')->get();
        $cnt = count($empl);
        $leaapp = LeavingApplication::where('status', '0')->get();
        $cnt2 = count($leaapp);
        $nots = Notice::all();
        $userprofile = User::find(auth()->user()->id);

        return view('index', compact('cnt', 'cnt2', 'nots', 'userprofile'));
    }

    public function login()
    {
        return view('loginpage');
    }

    public function login_sub(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('ERROR', 'Invalid Id Password');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }

    public function reg_store(Request $request)
    {
        // dd($request->all());

        if ($request->id == '0') {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'phone_no' => 'required',
                'emgphone_no' => 'required',
                'address' => 'required',
                'joining_date' => 'required',
                'designation' => 'required',
                'image' => 'required',
                'document' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'emgphone_no' => 'required',
                'address' => 'required',
                'joining_date' => 'required',
                'designation' => 'required',
                'image' => 'required',
                'document' => 'required',
            ]);
        }

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        if ($request->id != '0') {
            $use = User::find($request->id);
            $usepw = $use->password;
        }

        if ($request->id == '0') {
            $pw = Hash::make($request->password);
        } elseif ($request->id != '0' && $request->password == null) {
            $pw = $usepw;
        } else {
            $pw = Hash::make($request->password);
        }

        if ($request->file('image')) {
            $new = "IMG" . time() . ".JPG";

            $request->image->move('image', $new);
        } else {
            $new = $request->image;
        }

        if ($request->file('document')) {
            $doc = "IMG" . rand(111111, 999999) . ".JPG";

            $request->document->move('image', $doc);
        } else {
            $doc = $request->document;
        }

        if ($request->id != '0') {
            $usty = $request->user_type;
        } else {
            $usty = 'employee';
        }

        $data = User::updateOrCreate([
            'id' => $request->id,
        ], [
            'name' => $request->name,
            'user_type' => $usty,
            'email' => $request->email,
            'password' => $pw,
            'phone_no' => $request->phone_no,
            'emgphone_no' => $request->emgphone_no,
            'address' => $request->address,
            'joining_date' => $request->joining_date,
            'designation' => $request->designation,
            'image' => $new,
            'document' => $doc,
        ]);

        if ($request->id == '0') {
            return true;
        } elseif ($request->id != '0' && auth()->user()->user_type == 'admin') {
            return true;
        } elseif ($request->id != '0' && auth()->user()->user_type == 'employee') {
            return redirect()->back()->with('SUCCESS', 'Edit Your Profile Successfully');
        }
    }
}
