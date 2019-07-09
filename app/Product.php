<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name','price','image','description'];

    public $timestamps = true;

    public function cates(){
    	return $this->belongsTo('App\Cate');
    }

    public function users(){
    	return $this->belongsTo('App\User');
    }

    public function product_images(){
    	return $this->hasMany('App\Product_image');
    }
}
