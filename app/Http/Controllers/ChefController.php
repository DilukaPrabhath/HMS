<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order_item;
use App\order;

class ChefController extends Controller
{

     public function index(){
        $orders =order::PendingOrderChef();
        return view('backend.chef.pending_order',compact('orders'));
     }
     public function complete(){
        $orders =order::CompleteOrderChef();
        return view('backend.chef.complete_orders',compact('orders'));
     }
      
    public function update(Request $request, $id)
    {
             $orders = order::find($id);
             $orders->status = 1;
             if(!$orders->save()){
               $data['sts'] = 0;
               $data['oid'] = $id;
             }else{
               $data['sts'] = 1;
               $data['oid'] = $id;
             }
             return $data;

            // return redirect()->back()->with('success','Order Confirmed..!');
    }

    public function PendingList($id)
    {
        $list = order::PendingOrderlist($id);
        return view('backend.chef.pending_order_list',compact('list'));
    }
}
