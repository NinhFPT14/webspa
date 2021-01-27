<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public  $table = 'slides';
    public  $filebase = ['title','contet','image','link','status'];
}
