<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveappShort extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','date','from','to','total_hours','reason','status'];
}
