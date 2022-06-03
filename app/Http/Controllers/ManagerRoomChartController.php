<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room_history;
use Charts;
use App\customer;
use DB;

class ManagerRoomChartController extends Controller
{
    public function index()
    {
        $room = room_history::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart3 =  Charts::database($room, 'area','highcharts')
                  ->title("Monthly Booking Rooms")
                  ->elementLabel("Total Rooms")
                  ->dimensions(500, 500)
                  ->responsive(true)
                  ->groupByMonth(date('Y'), true);

        $chart4 =  Charts::database($room, 'donut','highcharts')
                  ->title("Monthly Booking Rooms")
                  ->elementLabel("Total Rooms")
                  ->dimensions(500, 500)
                  ->responsive(true)
                  ->groupByMonth(date('Y'), true);

        return view('backend.manager.report.room.more_details',compact('chart3','chart4'));

    } 
}
