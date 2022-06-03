<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminDateRangeController extends Controller
{
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if(!empty($request->from_date))
      {
       $data = DB::table('order_items')
         ->whereBetween('created_at', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('order_items')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
     return view('backend.admin.report.order.order_report');
    }

}
