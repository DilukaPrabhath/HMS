<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class section extends Model
{
   public static function Sectiondata() {
    $sql= DB::table('sections')
        ->select('sections.*', 'users.fname','users.lname','offers.offer_name')
        ->leftjoin('users','sections.user_id', '=', 'users.id')
        ->leftjoin('offers','sections.offer_id', '=', 'offers.id')
        //->orderBy('customers.created_at', 'desc')
        ->get();
        return $sql; 
    }
}
