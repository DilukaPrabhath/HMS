<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\room_history;

class AdminRoomDateRangeController extends Controller
{
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if(!empty($request->from_date))
      {
       $data = DB::table('room_histories')
         ->whereBetween('created_at', array($request->from_date, $request->to_date, $request->roo_no))
         ->get();
      }
      else
      {
       $data = DB::table('room_histories')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
     return view('backend.admin.report.room.more_details');
    }
}
