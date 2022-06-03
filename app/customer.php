<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class customer extends Model
{
   
    public static function customerdata() {
    $sql= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        //->orderBy('customers.created_at', 'desc')
        ->get();
        return $sql; 
    }

    public static function customerDataEditid($id) {
    $sql= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        ->where('customers.id','=',$id)
        ->get();
        return $sql; 
    }

    public static function customerDataViewid($id) {
    $sql= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        ->where('customers.id','=',$id)
        ->get();
        return $sql; 
    }

    public static function ReservedRoom() {
    $sql= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name','rooms.status')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        ->where('customers.status', '=' , 1)
        ->get();
        return $sql; 
    }

    public static function AvailableRoom() {
    $sql= DB::table('rooms')
        ->select('rooms.*')
        ->where('rooms.status', '=' , 1)
        ->get();
        return $sql; 
    }
    public static function ReleaseRoom($id) {
    $sql= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        ->where('customers.id','=',$id)
        ->get();
        return $sql; 
    }

    public static function CheckinList() {
    $sql= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name','rooms.price as roomprice')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        ->where('customers.status', '=' , 1)
        ->orderBy('customers.created_at', 'desc')
        ->get();
        return $sql; 
    }
     public static function CheckoutList() {
    $sql= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name','rooms.price as roomprice')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        ->where('customers.status', '=' , 0)
        ->orderBy('customers.created_at', 'desc')
        ->get();
        return $sql; 
    }

    public static function Checkout($id) {
    $sql= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name','rooms.price as roomprice','orders.order_no as oid','room_types.room_type as roomtype','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','rooms.id as roomid','rooms.status','customers.id','order_items.unit_price','room_types.room_type as type')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        ->leftjoin('room_types','customers.room_type_id', '=', 'room_types.id')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
        // ->leftjoin('sections','int_sections.section_id', '=', 'sections.id')
        // ->leftjoin('int_sections','customers.id', '=', 'int_sections.customer_id')
        ->where('customers.id','=',$id)
         // ->where('orders.status', '=' , 1)
        ->get();
        return $sql; 
    }
    
}
