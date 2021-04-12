<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillService extends Model
{
    protected  $table = "bill_services";
    public $timestamps = true;
    protected  $fillable =['appointment_id','payment_methods'];

}
