<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $table = "categories";
    public $timestamps = true;
    protected  $fillable =['name','type','status'];

    public function Product()
    {
        return $this->hasMany('App\Model\Product');
    }
}
