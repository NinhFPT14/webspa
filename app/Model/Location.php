<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected  $table = "locations";
    public $timestamps = true;
    protected  $fillable =['name','staff_id','status'];
}
