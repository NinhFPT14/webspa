<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected  $table = "appointments";
    public $timestamps = true;
    protected  $fillable =['name','phone','note','voucher_id','time_ficked','time_start','status','token','otp','payment_methods'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'number_services');
    }

}