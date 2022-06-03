<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use App\Exports\CustCheckIn;
use App\Exports\CustCheckOut;
use App\Exports\AllRoomExport;
use App\Exports\AvailableRoomExport;
use App\Exports\NotAvailableRoomExport;
use App\Exports\RoomHistroyExport;
use App\customer;
use App\room_history;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ManagerReportController extends Controller
{
    public function index()
    {
     return view('backend.manager.report.all_report');
    }
     public function customerreport()
    {
     return view('backend.manager.report.customer.customer_report');
    }
    /**Customer Excel*/
    public function csv_export_customer(){

    return Excel::download(new CsvExport,'customer_data.csv');

  }
   public function csv_export_checkin_customer(){

    return Excel::download(new CustCheckIn,'customer_checkin_data.csv');

  }

  public function csv_export_checkout_customer(){

    return Excel::download(new CustCheckOut,'customer_checkout_data.csv');

  }
  public function individualcustreport()
    {
    $customers = customer::customerdata();
     return view('backend.manager.report.customer.individual_customer_data',compact('customers'));
    }

    /**Room Excel*/
    public function roomreport()
    {
     return view('backend.manager.report.room.room_report');
    }
  public function csv_export_room(){

    return Excel::download(new AllRoomExport,'room_data.csv');

  }
  public function csv_export_Availableroom(){

    return Excel::download(new AvailableRoomExport,'Available_room_data.csv');

  }
   public function csv_export_NotAvailableroom(){

    return Excel::download(new NotAvailableRoomExport,'NotAvailable_room_data.csv');

  }
  public function view()
    {
        $roomhistroy = room_history::all();
        return view('backend.manager.report.room.room_vise',compact('roomhistroy'));
    }


    public function csv_export_roomhistroy(){

    return Excel::download(new RoomHistroyExport,'room_histroy_data.csv');

  }
   public function moredetails()
    {
     return view('backend.manager.report.room.more_details');
    }
}
