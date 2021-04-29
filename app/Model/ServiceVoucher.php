<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ServiceVoucher extends Model
{
    protected  $table = "service_vouchers";
    public $timestamps = true;
    protected  $fillable =['code','discount','time_start','time_end','status'];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_id');
    }
}