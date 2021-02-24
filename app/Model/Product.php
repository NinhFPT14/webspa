<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $table = "products";
    public $timestamps = true;
    protected  $fillable =['name','description','detail','price','discount','quality','slug','status','category_id'];
    public function ProductImage()
    {
        return $this->hasMany('App\Model\ProductImage');
    }

    public function Category()
    {
      return $this->belongsTo('App\Model\Category');
    }
}