<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected  $table = "appointments";
    public $timestamps = true;
    protected  $fillable =['name','phone','note','user_id','voucher_id','time_ficked','time_start','status'];

}