<?php

namespace App\Services\AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    use HasFactory;


    protected $fillable =  ['emp_id','time_in','time_out', 'status'];

}
