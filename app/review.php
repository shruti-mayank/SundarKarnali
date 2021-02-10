<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $fillable = ['news_id','name','email','description'];
}