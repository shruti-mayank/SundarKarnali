<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function subcategory(){
    	return $this->belongsTo('App\category');
    }

    public function subcat(){
    	return $this->hasMany('App\mainnews', 'id');
    }
}
