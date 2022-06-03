<?php

namespace App\Exports;
use DB;
use App\customer;

use Maatwebsite\Excel\Concerns\FromCollection;

class CustCheckIn implements FromCollection
{
    
    public function collection()
    {
      $sql = DB::table("customers")
      ->select('customers.*', 'rooms.room_no as room_name','room_types.room_type as typename')
      ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
      ->leftjoin('room_types','customers.room_type_id', '=', 'room_types.id')
      ->where('customers.status', '=' , 1)
      ->orderBy('customers.created_at', 'desc')
      ->get();
      return $sql; 
    }
}
