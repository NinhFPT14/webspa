<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected  $table = "staffs";
    public $timestamps = true;
    protected  $fillable =['name','image','status'];
}
