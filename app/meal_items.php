<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class meal_items extends Model
{
    

        public function offername()
{
    return $this->belongsTo('App\offers','offer_id');
}
protected $table = 'meal_items'; 
}
