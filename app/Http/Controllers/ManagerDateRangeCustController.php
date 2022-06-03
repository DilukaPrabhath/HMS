<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use App\Exports\CustSelectData;
use App\Exports\CustAllData;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;
use App\room_history;
use App\customer;

class ManagerDateRangeCustController extends Controller
{
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if(!empty($request->from_date))
      {
       $data = DB::table('customers')
         ->whereBetween('created_at', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('customers')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
     return view('backend.manager.report.customer.customer_date_vise');
    } 

     public function exportall(Request $request)
    {
      $data = DB::table('customers')
         ->whereBetween('created_at', array($request->from_date, $request->to_date))
         ->get();
         return $data;
    
    }

    public function exportselect(Request $request)
    {

      $from_date=$request->from_date;
      $to_date = $request->to_date;

      
      return Excel::download(new CustSelectData($from_date,$to_date), 'customer_data.xlsx');

}

}
