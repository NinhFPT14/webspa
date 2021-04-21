<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected  $table = "posts";
    public $timestamps = true;
    protected  $fillable =[
            'title',
            'description',
            'detail',
            'avatar',
            'slug',
            'status',
            'category_id'
        ];
}
