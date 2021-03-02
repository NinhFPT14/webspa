<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected  $table = "services";
    public $timestamps = true;
    protected  $fillable =['name','description','detail','price','disconut','slug','time_working','total_time','time_distance','status'];
}
