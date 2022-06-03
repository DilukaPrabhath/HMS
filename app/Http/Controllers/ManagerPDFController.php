<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use customer;

class ManagerPDFController extends Controller
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
      $pdf = PDF::loadView('backend.manager.report.customer.customer_report_pdf');
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
      $pdf = PDF::loadView('backend.manager.report.customer.checkin_customer_pdf');
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
      $pdf = PDF::loadView('backend.manager.report.customer.checkout_customer_pdf');
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
        $pdf = PDF::loadView('backend.manager.report.customer.individual_customer_pdf');
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
      $pdf = PDF::loadView('backend.manager.report.room.all_room_pdf');
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
      $pdf = PDF::loadView('backend.manager.report.room.available_room_pdf');
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
      $pdf = PDF::loadView('backend.manager.report.room.not_available_room_pdf');
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream();
   
    }
}
