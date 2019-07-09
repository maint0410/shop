<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cates';

    protected $fillable = ['name','created_at','updated_at'];

    public $timestamps = true;

    public function products(){
    	return $this->hasMany('App\Product');
    }
}
