<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected  $table = "appointments";
    public $timestamps = true;
<<<<<<< HEAD
    protected  $fillable =['name','phone','note','voucher_id','time_ficked','time_start','status','token','otp','payment_methods'];
=======
    protected  $fillable =['name','phone','note','voucher_id','time_ficked'
    ,'time_start','status','token','otp','payment_methods','call_confirmation'
    ,'payment_status','note_admin','total_money'];
>>>>>>> 83d7db279a5cfeecda5331e4c9f0a136abdaec02

    public function services()
    {
        return $this->belongsToMany(Service::class, 'number_services','appointment_id','service_id');
    }

}