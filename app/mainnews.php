<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mainnews extends Model
{
    protected $fillable = ['id', 'title', 'description', 'image','editor','keyword','hashtag','status','category_id','subcategory_id'];

    public function news(){
    	return $this->belongsTo('App\category', 'category_id');
    }

    public function mainnews(){
    	return $this->belongsTo('App\subcategory', 'subcategory_id');
    }
}
