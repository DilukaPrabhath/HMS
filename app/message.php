<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class message extends Model
{
    protected $table = 'messages';
    public $timestamps = false;
    protected $primaryKey = 'id';


public static function Getmsg($x) {
    $sql= DB::table('messages')
        ->select('messages.*', 'users.fname','users.lname')
        ->leftjoin('users','messages.user_id', '=', 'users.id')
        ->where('users.id','=',$x)
        ->where('messages.msg_status','=',0)
        ->get();
        return $sql;
    }

    public static function Getmsg2($x) {
    $sql= DB::table('messages')
        ->select('messages.*', 'a.fname as afname','a.lname as alname', 'a.userimg as aimg', 'b.fname as bfname','b.lname as blname','b.userimg as bimg')
        ->leftjoin('users AS a','messages.user_id', '=', 'a.id')
        ->leftjoin('users AS b','messages.sender_id', '=', 'b.id')
        ->where('messages.user_id','=',$x)
        ->where('messages.msg_status','=',0)
        ->orderBy('messages.created_at', 'desc')
        ->groupBy('emp_no')
        ->get();
        return $sql;
    }

    public static function ReceivedMsg($id) {
    $sql= DB::table('messages')
        ->select('messages.*')
        ->where('messages.id','=',$id)
        ->get();
        return $sql;
    }

    public static function List($id) {
        $sql= DB::table('messages')
        ->select('messages.*')
        ->leftjoin('users','messages.user_id', '=', 'users.id')
         ->where('users_id', '=', $id)
         ->orderBy('messages.created_at', 'desc')
        ->get();
        return $sql;
    }

    public static function load_message($id,$au) {

        $sql= DB::table('messages')
        ->select('messages.*','users.fname','users.lname')
        ->leftjoin('users','messages.user_id', '=', 'users.id')
        ->orwhere('sender_id', '=', $id)
        ->orwhere('user_id', '=',  $id)
        ->orderBy('messages.created_at', 'desc')
        ->get();
        return $sql;
    }


}

