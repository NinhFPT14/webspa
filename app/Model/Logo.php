<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    public  $table = 'logos';
    public  $filebale = ['image','status'];
}
