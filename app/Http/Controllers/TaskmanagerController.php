<?php

namespace App\Http\Controllers;

use App\Models\Taskmanager;
use App\Models\Taskmanagerchanges;
use App\Models\User;
use Illuminate\Http\Request;

class TaskmanagerController extends Controller
{
    public function page()
    {
        $datas = Taskmanager::where('user_id', auth()->user()->id)->get();
        $userprofile = User::find(auth()->user()->id);
        return view('taskmanagerpage', compact('datas','userprofile'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'todo' => 'required',
        ]);

        $useid = auth()->user()->id;

        $background_colors = array('#F8F9F9','#66cc99','#E5E8E8','#B2BABB','#f2f2f2','#ccddff','#D0D3D4','#5D6D7E','#ff704d','#D4E6F1','#D6EAF8','#b3b3ff','#a3a3c2','#df9f9f','#99e6ff','#a3c2c2');

        $rand_background = $background_colors[array_rand($background_colors)];

        $data = Taskmanager::create([
            'user_id' => $useid,
            'task' => $request->todo,
            'status' => 'ToDo',
            'bgcolor' => $rand_background,
        ]);

        return redirect()->route('taskmanager');
    }

    public function savech(Request $request)
    {
        // dd($request->all());

        $idtd = $request->idtd;
        $idpro = $request->idpro;
        $idq_a = $request->idq_a;
        $iddone = $request->iddone;

        $useid = auth()->user()->id;

        $datas = Taskmanager::where('user_id', $useid)->first();

        if ($idtd != null) {
            foreach ($idtd as $value) {
                $td = $datas->find($value);
                $td->status = 'ToDo';
                $td->save();
            }
        }

        if ($idpro != null) {
            foreach ($idpro as $value1) {
                $pr = $datas->find($value1);
                $pr->status = 'Progress';
                $pr->save();
            }
        }

        if ($idq_a != null) {
            foreach ($idq_a as $value11) {
                $qa = $datas->find($value11);
                $qa->status = 'Q/A';
                $qa->save();
            }
        }

        if ($iddone != null) {
            foreach ($iddone as $value111) {
                $dn = $datas->find($value111);
                $dn->status = 'Done';
                $dn->save();
            }
        }
        return true;
    }

    public function deltask(Request $request)
    {

        $data = Taskmanager::find($request->id);
        $data->delete();

        return true;
    }

    public function showtaskstatus($id)
    {
        $use = User::find($id);

        $todo = Taskmanager::where('user_id',$id)->where('status','ToDo')->get();

        $progress = Taskmanager::where('user_id',$id)->where('status','Progress')->get();

        $qa = Taskmanager::where('user_id',$id)->where('status','Q/A')->get();

        $done = Taskmanager::where('user_id',$id)->where('status','Done')->get();

        return view('showtaskstatus',compact('use','todo','progress','qa','done'));
    }
}
