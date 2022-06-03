<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use App\Exports\UsersExport;
use App\Exports\CustCheckIn;
use App\Exports\CustCheckOut;
use App\Exports\ActiveUserExport;
use App\Exports\InactiveUserExport;
use App\Exports\AllRoomExport;
use App\Exports\AvailableRoomExport;
use App\Exports\NotAvailableRoomExport;
use App\Exports\RoomHistroyExport;
use App\Exports\AllOrders;
use App\Exports\CompleteOrders;
use App\Exports\PendingOrders;
use App\customer;
use App\room_history;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class AdminExportExcelController extends Controller
{

 public function __construct()
    {
        $this->middleware('auth');
    } 

     public function index()
    {
     return view('backend.admin.report.all_report');
    }
    public function customerreport()
    {
     return view('backend.admin.report.customer.customer_report');
    }
    public function userreport()
    {
     return view('backend.admin.report.user.user_report');
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
/**User Excel*/
  public function csv_export_user(){

    return Excel::download(new UsersExport,'user_data.csv');

  }

public function csv_export_activeuser(){

    return Excel::download(new ActiveUserExport,'active_user_data.csv');

  }
  public function csv_export_inactiveuser(){

    return Excel::download(new InactiveUserExport,'inactive_user_data.csv');

  }

  /**Room Excel*/
  public function roomreport()
    {
     return view('backend.admin.report.room.room_report');
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
        return view('backend.admin.report.room.room_vise',compact('roomhistroy'));
    }


    public function csv_export_roomhistroy(){

    return Excel::download(new RoomHistroyExport,'room_histroy_data.csv');

  }
   public function moredetails()
    {
     return view('backend.admin.report.room.more_details');
    }

/**Order Excel*/
public function csv_export_allorders(){

    return Excel::download(new AllOrders,'allorders_data.csv');

  }
  public function csv_export_completeorders(){

    return Excel::download(new CompleteOrders,'complete_orders_data.csv');

  }
  public function csv_export_pendingorders(){

    return Excel::download(new PendingOrders,'pending_orders_data.csv');

  }

}
?>