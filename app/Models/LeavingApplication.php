<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeavingApplication extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','day','from','to','total_days','reason'];
}
