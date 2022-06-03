<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use App\Exports\CustSelectData;
use App\Exports\CustSelectAllData;
use App\Exports\CustAllData;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;
use App\room_history;
use App\customer;

class AdminDateRangeCustController extends Controller
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
     return view('backend.admin.report.customer.customer_date_vise');
    }

    //  public function exportall(Request $request)
    // {
    //   $data = DB::table('customers')
    //      ->whereBetween('created_at', array($request->from_date, $request->to_date))
    //      ->get();
    //      return $data;

    // }

    public function exportselect(Request $request)
    {

      $from_date=$request->from_date;
      $to_date = $request->to_date;
    //  // return Excel::download(new CustSelectData($from_date,$to_date), 'customer_all_data.xlsx');
    // //   if(request()->ajax())
    // //  {

      if(!empty($request->from_date))
      {
    //   $from_date="2021-04-18";
    //   $to_date ="2021-07-18";
    //   return $from_date;
    //   return Excel::download(new CustSelectData($from_date,$to_date), 'customer_select_data.xlsx');
         return (new CustSelectData($from_date,$to_date))->download('customer_data.xlsx');
      }else{

    //   $from_date="2021-04-18";
    //   $to_date ="2021-07-18";
      $data = customer::select('fname','lname','mobile','email','nic','created_at')->orderBy('created_at','asc')->get();
    //   return $data;

         return (new CustSelectAllData)->download('customer_data.xlsx');
      }

    //   return datatables()->of($data)->make(true);
    // //  }
    // //  return Excel::download(new CustSelectData($from_date,$to_date), 'customer_all_data.xlsx');


    //   // return Excel::download(new CustSelectData($from_date,$to_date), 'customer_data.xlsx');

    //   $from_date="2021-04-18";
    //   $to_date ="2021-08-18";
    //  //return $from_date;
    //  // return Excel::download(new CustSelectData($from_date,$to_date), 'customer_select_data.xlsx');
    //  return (new CustSelectData($from_date,$to_date))->download('customer_data.xlsx');



}

}
