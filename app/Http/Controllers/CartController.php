<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\meal_items;
use App\Temp_order;
use App\order_item;

class CartController extends Controller
{
   public function view()
    {   $auid = 1;
        $items = Temp_order::where('customer_id',$auid)->get();
        // $meal_items = meal_items::all();
        return view('backend.website.cart',compact('items'));
    }

    
     public function add_to_cart($id)
    {   
        $meal = meal_items::find($id);

        $tmp_item = new Temp_order();
        $tmp_item->item_name   = $meal->item_name;
        $tmp_item->item_price  = $meal->item_price;
        $tmp_item->icon        = $meal->icon;
        $tmp_item->customer_id = 1;
        $tmp_item->save();

         $notification = array(
           'message' => 'Item Add successfully!',
            'alert-type' => 'Success'
        );
         return redirect('website/cartdetails')->with($notification);
        
    }


     public function addtocart(Request $request)
    {   
       
       $latest = order_item::latest()->first();
      if (! $latest) {
          $orderid = 'HMS/ORD/000001';
      }else{
        $string = preg_replace("/[^0-9\.]/", '', $latest->order_id);
          $orderid = 'HMS/ORD/' . sprintf('%06d', $string+1);

      }

        $tmp_item = new order_item();
        $tmp_item->order_id   = $orderid;
        $tmp_item->item_name   = $request->item_name;
        $tmp_item->item_price  = $request->item_price;
        $tmp_item->quantity    = $request->quantity;
        $tmp_item->customer_id = 1;
        $tmp_item->icon        = $request->icon;
        $tmp_item->user_id     = 2;  
        $tmp_item->total_price = $request->total2;
        $tmp_item->save();

        $id = 1;
        $cid = Temp_order::select('id')->where('customer_id',$id)->get();

        $tmpit = Temp_order::find($cid[0]->id);
        
        $tmpit->delete();


         $notification = array(
           'message' => 'Place Order successfully!',
            'alert-type' => 'Success'
        );
        // return redirect('website/cartdetails')->with($notification);
        
    }


}
