<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected  $table = 'feedbacks';
    protected  $filebale = ['name','phone_number','content','status'];
}
