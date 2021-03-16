<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NumberService extends Model
{
    protected  $table = "number_services";
    public $timestamps = true;
    protected  $fillable =['appointment_id','service_id'];

}
