<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class order extends Model
{
    // public static function Pending($id) {
    // $sql= DB::table('order_items')
    //     ->select('order_items.*')
    //     ->where('order_items.id','=',$id)
    //     ->get();
    //     return $sql; 
    // }
 

    public static function PendingOrderAdmin() {
     $sql= DB::table('customers')
        ->select('customers.*', 'orders.order_no as oid','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','customers.id','order_items.unit_price','orders.status','orders.id','orders.total_price','roomboys.fname as rfname','roomboys.lname as rlname')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
        ->leftjoin('roomboys','orders.user_id', '=', 'roomboys.id')
        ->where('customers.status', '=' , 1)
        ->where('orders.status', '=' , 0)
        ->get();
        return $sql; 
    }
    public static function CompleteOrderAdmin() {
     $sql= DB::table('customers')
        ->select('customers.*', 'orders.order_no as oid','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','customers.id','order_items.unit_price','orders.status','orders.id','orders.total_price','roomboys.fname as rfname','roomboys.lname as rlname')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
        ->leftjoin('roomboys','orders.user_id', '=', 'roomboys.id')
        ->where('customers.status', '=' , 1)
        ->where('orders.status', '=' , 1)
        ->get();
        return $sql; 
    }

    public static function FeedbackOrderView($id) {
    $sql= DB::table('order_items')
        ->select('order_items.order_id as orderidview')
        ->where('order_items.id','=',$id)
        ->get();
        return $sql; 
    }
    protected $guarded = [];

     public static function PendingOrderChef() {

        $sql= DB::table('customers')
        ->select('customers.*','orders.created_at','orders.status','roomboys.fname as rfname','roomboys.lname as rlname')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('roomboys','orders.user_id', '=', 'roomboys.id')
        ->where('customers.status', '=' , 1)
        ->where('orders.status', '=' , 0)
        ->orderBy('customers.created_at', 'desc')
        ->get();
        return $sql; 
    }
     public static function CompleteOrderChef() {

        $sql= DB::table('customers')
        ->select('customers.*','orders.created_at','orders.status','roomboys.fname as rfname','roomboys.lname as rlname')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('roomboys','orders.user_id', '=', 'roomboys.id')
        ->where('customers.status', '=' , 1)
        ->where('orders.status', '=' , 1)
        ->orderBy('customers.created_at', 'desc')
        ->get();
        return $sql; 
    }
   
    public static function PendingOrderlist($id) {
    $sql= DB::table('customers')
        ->select('customers.*', 'orders.order_no as oid','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','customers.id','order_items.unit_price','orders.status','orders.id','roomboys.fname as rfname','roomboys.lname as rlname')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
        ->leftjoin('roomboys','orders.user_id', '=', 'roomboys.id')
        ->where('customers.id','=',$id)
        ->get();
        return $sql; 
    }
}
