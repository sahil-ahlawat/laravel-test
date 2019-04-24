<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	protected $table = 'product'; // table namespace
	protected $fillable = ['id', 'name', 'category','price'];
	
}
