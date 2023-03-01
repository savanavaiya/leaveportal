<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','date','timerstart','timerend','timerstartenddiff','timerrecordtime','status'];

    public function use()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
