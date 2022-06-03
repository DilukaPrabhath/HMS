<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Charts;
use App\User;
use App\customer;
use App\room;
use DB;
use PDF;

class AdminPDFController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
/**Customer PDF Reports*/
    public function pdfviewcustomer(Request $request){
      $customers = DB::table("customers")
      ->select('customers.*', 'rooms.room_no as room_name','room_types.room_type as typename')
      ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
      ->leftjoin('room_types','customers.room_type_id', '=', 'room_types.id')
      ->orderBy('customers.created_at', 'desc')
      ->get();
      view()->share('customers',$customers);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.customer.customer_report_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
      
    }
    public function pdfviewactivecustomer(Request $request){
       $customers = DB::table("customers")
      ->select('customers.*', 'rooms.room_no as room_name','room_types.room_type as typename')
      ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
      ->leftjoin('room_types','customers.room_type_id', '=', 'room_types.id')
      ->where('customers.status', '=' , 1)
      ->orderBy('customers.created_at', 'desc')
      ->get();
      view()->share('customers',$customers);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.customer.checkin_customer_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
      
    }

     public function pdfviewainactivecustomer(Request $request){
       $customers = DB::table("customers")
      ->select('customers.*', 'rooms.room_no as room_name','room_types.room_type as typename')
      ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
      ->leftjoin('room_types','customers.room_type_id', '=', 'room_types.id')
      ->where('customers.status', '=' , 0)
      ->orderBy('customers.created_at', 'desc')
      ->get();
      view()->share('customers',$customers);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.customer.checkout_customer_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
      
    }

    public function individualcustreportview($id)
    {

        $customers= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name','room_types.room_type as typename')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        ->leftjoin('room_types','customers.room_type_id', '=', 'room_types.id')
        ->where('customers.id','=',$id)
        ->get();
         view()->share('customers',$customers);
        $pdf = \App::make('dompdf.wrapper');
        $pdf = PDF::loadView('backend.admin.report.customer.individual_customer_pdf');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
    //Print
    public function printcustrecepit($id)
    {

         $print= DB::table('customers')
        ->select('customers.*', 'rooms.room_no as room_name','rooms.price as roomprice','orders.order_no as oid','room_types.room_type as roomtype','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','rooms.id as roomid','rooms.status','customers.id','order_items.unit_price')
        ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
        ->leftjoin('room_types','customers.room_type_id', '=', 'room_types.id')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
        ->where('customers.id','=',$id)
        ->get();
         view()->share('customers',$print);
        $pdf = \App::make('dompdf.wrapper');
        $pdf = PDF::loadView('backend.admin.customer.print_receipt');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function individualcustreport()
    {
    $customers = customer::customerdata();
     return view('backend.admin.report.customer.individual_customer_data',compact('customers'));
    }

    /**User PDF Reports*/

    public function pdfviewuser(Request $request){
      $users = DB::table("users")
      ->select('users.*', 'user_types.user_type as type_name',)
      ->leftjoin('user_types','users.user_type_id', '=', 'user_types.id')
      ->orderBy('users.created_at', 'desc')
      ->get();
      view()->share('users',$users);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.user.all_user_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
      
    }
     public function pdfviewactiveuser(Request $request){
       $users = DB::table("users")
      ->select('users.*', 'user_types.user_type as type_name',)
      ->leftjoin('user_types','users.user_type_id', '=', 'user_types.id')
      ->where('users.status', '=' , 1)
      ->orderBy('users.created_at', 'desc')
      ->get();
      view()->share('users',$users);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.user.active_user_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
      
    }
    public function pdfviewinactiveuser(Request $request){
       $users = DB::table("users")
      ->select('users.*', 'user_types.user_type as type_name',)
      ->leftjoin('user_types','users.user_type_id', '=', 'user_types.id')
      ->where('users.status', '=' , 0)
      ->orderBy('users.created_at', 'desc')
      ->get();
      view()->share('users',$users);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.user.inactive_user_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
      
    }
    public function individualuserreport()
    {
        $users= DB::table('users')
        ->select('users.*', 'user_types.user_type as type_name')
        ->leftjoin('user_types','users.user_type_id', '=', 'user_types.id')
        ->orderBy('users.created_at', 'desc')
        ->get();
        return view('backend.admin.report.user.individual_user_data',compact('users'));
    }

     public function individualuserreportview($id)
    {

        $users= DB::table('users')
        ->select('users.*', 'user_types.user_type as type_name',)
        ->leftjoin('user_types','users.user_type_id', '=', 'user_types.id')
        ->where('users.id','=',$id)
        ->get();
         view()->share('users',$users);
        $pdf = \App::make('dompdf.wrapper');
        $pdf = PDF::loadView('backend.admin.report.user.individual_user_pdf');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
     
    }

    /**Room PDF Reports*/

    public function pdfviewallroom(Request $request){

      $rooms = DB::table("rooms")
      ->select('rooms.*', 'room_types.room_type as type_name',)
      ->leftjoin('room_types','rooms.room_type_id', '=', 'room_types.id')
      ->orderBy('rooms.created_at', 'asc')
      ->get();
      view()->share('rooms',$rooms);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.room.all_room_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
   
    }
     public function pdfviewavailableroom(Request $request){

      $rooms = DB::table("rooms")
      ->select('rooms.*', 'room_types.room_type as type_name',)
      ->leftjoin('room_types','rooms.room_type_id', '=', 'room_types.id')
      ->where('rooms.status', '=' , 1)
      ->orderBy('rooms.created_at', 'asc')
      ->get();
      view()->share('rooms',$rooms);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.room.available_room_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
   
    }
     public function pdfviewnotavailableroom(Request $request){

      $rooms = DB::table("rooms")
      ->select('rooms.*', 'room_types.room_type as type_name',)
      ->leftjoin('room_types','rooms.room_type_id', '=', 'room_types.id')
      ->where('rooms.status', '=' , 0)
      ->orderBy('rooms.created_at', 'asc')
      ->get();
      view()->share('rooms',$rooms);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.room.not_available_room_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
   
    }

    public function allorders(Request $request){

      $customers= DB::table('customers')
        ->select('customers.*', 'orders.order_no as oid','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','customers.id','order_items.unit_price','orders.status','orders.id','orders.total_price','order_items.created_at')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
         ->orderBy('customers.created_at', 'desc')
        // ->where('orders.status', '=' , 0)
        ->get();
      view()->share('customers',$customers);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.order.all_order_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
   
    }
    public function completeorders(Request $request){

      $customers= DB::table('customers')
        ->select('customers.*', 'orders.order_no as oid','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','customers.id','order_items.unit_price','orders.status','orders.id','orders.total_price','order_items.created_at')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
        ->orderBy('customers.created_at', 'desc')
        ->where('customers.status', '=' , 0)
        ->where('orders.status', '=' , 1)
        ->get();
      view()->share('customers',$customers);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.order.complete_order_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
   
    }
  public function pendingorders(Request $request){

      $customers= DB::table('customers')
        ->select('customers.*', 'orders.order_no as oid','order_items.icon','order_items.item_name','order_items.qty','order_items.all_price','customers.id','order_items.unit_price','orders.status','orders.id','orders.total_price','order_items.created_at')
        ->leftjoin('orders','customers.id', '=', 'orders.customer_id')
        ->leftjoin('order_items','orders.id', '=', 'order_items.order_id')
        ->orderBy('customers.created_at', 'desc')
        ->where('customers.status', '=' , 1)
        ->where('orders.status', '=' , 0)
        ->get();
      view()->share('customers',$customers);
      $pdf = \App::make('dompdf.wrapper');
      $pdf = PDF::loadView('backend.admin.report.order.pending_order_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
   
    }
}
