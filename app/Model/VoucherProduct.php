<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class VoucherProduct extends Model
{
    protected  $table = "product_vouchers";
    public $timestamps = true;
    protected  $fillable =['code','discount','time_start','time_end','status','product_id'];
}
