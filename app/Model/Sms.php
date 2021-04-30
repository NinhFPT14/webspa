<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected  $table = "sms";
    public $timestamps = true;
    protected  $fillable =['code_api','code_devices'];
}
