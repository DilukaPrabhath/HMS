<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class AllOrders implements FromCollection
{
   
    public function collection()
    {
          $allorders= DB::table('customers')
        ->select('customers.*', 'customers.fname', 'customers.lname','customers.nic','customers.mobile','orders.order_no as oid','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','customers.id','order_items.unit_price','orders.status','orders.id','orders.total_price','order_items.created_at')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
         ->orderBy('customers.created_at', 'desc')
        // ->where('orders.status', '=' , 0)
        ->get();
        return $allorders; 
    }
}
