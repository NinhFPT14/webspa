<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    protected  $table = "oders";
    public $timestamps = true;
    protected  $fillable =['name','phone_number','address','note','total_monney','status','tax'];
}
