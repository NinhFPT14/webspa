<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    public  $table = 'footer_informations';
    public  $filebale = ['address','phone_number','email','link_fanpage'];
}
