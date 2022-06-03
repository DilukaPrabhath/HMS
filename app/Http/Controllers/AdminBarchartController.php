<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order_item;
use Charts;
use App\customer;
use App\User;
use DB;

class AdminBarchartController extends Controller
{
    
    public function index()
    {
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

        return view('backend.admin.index',compact('chart','chart2'));

    } 
}
