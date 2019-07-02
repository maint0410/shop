<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name','price','cate_id','user_id'];

    public $timestamps = false;
}
