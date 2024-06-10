<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRecord extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','leave_day','leave_datefrom','leave_dateto','leave_total_days','leave_reason'];

    public function username()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
