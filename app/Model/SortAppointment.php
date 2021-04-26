<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SortAppointment extends Model
{
    protected  $table = "sort_appointments";
    public $timestamps = true;
    protected  $fillable =['appointment_id','location_id','time_start',
    'time_end','status','service_id','name_service','name_location','name_staff'];
}