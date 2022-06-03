<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\roomboy;
use App\Product;
use App\Order_item;
use App\meal_items;
use App\customer;
use App\order;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Mail\SendMail;
// use DB;


class MealCartController extends Controller
{
   public function index()
    {
        // $products = Product::all();
        $products = meal_items::all();
        return view('backend.website.cart.product', compact('products'));
    }

    public function cart()
    {
        return view('backend.website.cart.cart');
    }

    public function addToCart($id)
    {
        $product = meal_items::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->item_name,
                        "quantity" => 1,
                        "price" => $product->item_price,
                        "photo" => $product->icon
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product Already added to cart!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->item_name,
            "quantity" => 1,
            "price" => $product->item_price,
            "photo" => $product->icon
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function store(Request $request)
    {

       $latest = order_item::latest()->first();
      if (! $latest) {
          $orderid = 'HMS/ORD/000001';
      }else{
        $string = preg_replace("/[^0-9\.]/", '', $latest->order_id);
        $orderid = 'HMS/ORD/' . sprintf('%06d', $string+1);

      }
      $cart = session()->get('cart');
      $totalCost = 0;
        foreach($cart as $c){
           $totalCost +=  $c['price'] * $c['quantity'];

        }
    $room = roomboy::orderBy('count', 'asc')->where('status',1)->first();
    $roomboyid = $room->id;
    $rm_boy_cnt = $room->count;

    $cust = customer::where('nic',$request->nic)->where('status',1)->first();
    $custid = $cust->id;
    // $custfname = $cust->fname;
    // $custmail = $cust->email;
    if ($cust) {
        $order = new order();
        $order->order_no    = $orderid;
        $order->total_price = $totalCost;
        $order->customer_id = $custid;
        $order->user_id = $roomboyid;
        $order->status = 0;
        $order->save();

        // $custmail = $request->email;
        // $custfname = $request->fname;
        // $data = [
        //         'fname' => $custfname->fname,

        // ];
        // Mail::send('backend.website.orderplace_mail', $data , function($message){
        // $message->to(Input::get('email'), Input::get('fname').' '.Input::get('lname'))->subject('Welcome to the Hotel Grand Opera');
        // });

        $rmboy = roomboy::find($roomboyid);
        $rmboy->count = $rm_boy_cnt + 1;
        $rmboy->save();


        //$roomboyid


        foreach($cart as $c){

        $item = new order_item();
        $item->order_id    = $order->id;
        $item->item_name   = $c['name'];
        $item->qty         = $c['quantity'];
        $item->unit_price  = $c['price'];
        $item->all_price   = $c['price'] * $c['quantity'];
        $item->icon        = $c['photo'];
        $item->save();
        }

         $notification = array(
           'message' => 'Place Order successfully!',
            'alert-type' => 'Success'
        );
        return redirect('website/placeorder')->with('status', 'Place Order successfully!');
    }else{
        $notification = array(
           'message' => 'Place Order Not Success!',
            'alert-type' => 'Success'
        );
        return redirect('website/placeorder')->with('status', 'Place Order Not Success!');
    }



    }

    public function dinner()
    {

    $products =meal_items::with('offername')->where('category', '=', "Dinner")->where('status', '=', 1)->get();
        return view('backend.website.cart.product',compact('products'));

    }
     public function breakfast()
    {

        $products =meal_items::with('offername')->where('category', '=',"Breakfast")->where('status', '=', 1)->get();
        return view('backend.website.cart.product',compact('products'));
    }
    public function lunch()
    {

        $products =meal_items::with('offername')->where('category', '=',"Lunch")->where('status', '=', 1)->get();
        return view('backend.website.cart.product',compact('products'));

    }
    public function dessert()
    {

        $products =meal_items::with('offername')->where('category', '=',"Dessert")->where('status', '=', 1)->get();
        return view('backend.website.cart.product',compact('products'));

    }
    public function drink()
    {

        $products =meal_items::with('offername')->where('category', '=',"Beverages")->where('status', '=', 1)->get();
        return view('backend.website.cart.product',compact('products'));

    }
    public function snack()
    {

        $products =meal_items::with('offername')->where('category', '=',"Snack")->where('status', '=', 1)->get();
        return view('backend.website.cart.product',compact('products'));

    }
    public function PlaceOrder()
    {

        return view('backend.website.cart.place_order');
    }


    public function getCus(Request $request)
    {

    $cust = customer::where('nic',$request->select)->where('status',1)->first();
    if ($cust) {
        return $cust;
    }else{
        return $cust = 0;
    }
    }

}
