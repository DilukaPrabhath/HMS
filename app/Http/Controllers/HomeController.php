<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Charts;
use App\customer;
use App\User;
use App\order;
use App\checkout_histories;
use Carbon\Carbon;
use DB;


class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        if(Auth::user()->user_type_id =='1'){
        $customers = customer::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart =  Charts::database($customers, 'bar','highcharts')
                  ->title("Monthly New Register Customers")
                  ->elementLabel("Total Customers")
                  ->dimensions(1000, 500)
                  ->responsive(true)
                  ->groupByMonth(date('Y'), true);


        $users  = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart2 = Charts::database($users, 'pie','highcharts')
                  ->title("Monthly New Register Users")
                  ->elementLabel("Total Users")
                  ->dimensions(500, 500)
                  ->responsive(true)
                  ->groupByMonth(date('Y'), true);

        $data = checkout_histories::whereMonth('created_at', Carbon::now()->month)->sum('order_price');
        $monthly = checkout_histories::whereMonth('created_at', Carbon::now()->month)->sum('total_price');
        return view('backend.admin.index',compact('chart','chart2','data','monthly'));


        }elseif( Auth::user()->user_type_id =='2')  
        {
        $data3 = checkout_histories::whereMonth('created_at', Carbon::now()->month)->sum('order_price');
        return view('backend.manager.dashboard',compact('data3'));


        }elseif( Auth::user()->user_type_id =='3')  
        {
        $data1 = checkout_histories::whereMonth('created_at', Carbon::now()->month)->sum('order_price');
        return view('backend.chef.dashboard',compact('data1'));


        }elseif( Auth::user()->user_type_id =='4')  
        {
        $data2 = checkout_histories::whereMonth('created_at', Carbon::now()->month)->sum('order_price');
        return view('backend.receptionist.dashboard',compact('data2'));
        }else

        {
            return view('login');  
        }

    }

}
