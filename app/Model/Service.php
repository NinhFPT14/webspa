<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected  $table = "services";
    public $timestamps = true;
    protected  $fillable =['name','image','description','detail','price','discount','status','slug','time_working','total_time','time_distance','category_id'];
}
