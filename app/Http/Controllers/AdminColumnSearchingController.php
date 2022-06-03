<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminColumnSearchingController extends Controller
{
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if($request->room)
      {
       $data = DB::table('customers')
         ->join('room_types', 'room_types.id', '=', 'customers.room_type_id')
         ->select('customers.*','room_types.room_type','rooms.room_no as room_name')
         ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
         ->where('customers.room_type_id', $request->room);
      }
      else
      {
       $data = DB::table('customers')
         ->join('room_types', 'room_types.id', '=', 'customers.room_type_id')
         ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
         ->select('customers.*','room_types.room_type','rooms.room_no as room_name');
      }

      return datatables()->of($data)->make(true);
     }

     $room = DB::table('room_types')
        ->select("*")
        ->get();

     return view('backend.admin.report.customer.customer_room_vise', compact('room'));
    }
}
