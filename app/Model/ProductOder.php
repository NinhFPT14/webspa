<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductOder extends Model
{
    protected  $table = "product_oders";
    public $timestamps = true;
    protected  $fillable =['product_id','oder_id','quality'];
}
