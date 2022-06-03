<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class CompleteOrders implements FromCollection
{
    
    public function collection()
    {
    
           $completeorders= DB::table('customers')
        ->select('customers.*', 'orders.order_no as oid','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','customers.id','order_items.unit_price','orders.status','orders.id','orders.total_price','order_items.created_at')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
        ->orderBy('customers.created_at', 'desc')
        ->where('customers.status', '=' , 0)
        ->where('orders.status', '=' , 1)
        ->get();
        return $completeorders; 
    }

}
