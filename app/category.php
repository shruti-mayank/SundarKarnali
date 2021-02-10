<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name'];

    public function category(){
    	return $this->hasMany('App\mainnews', 'id');
    }
}
