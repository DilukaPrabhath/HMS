<?php

namespace App\Exports;

use App\customer;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExport implements FromCollection
{
    
    public function collection()
    {

      $sql = DB::table("customers")
      ->select('customers.*', 'rooms.room_no','room_types.room_type')
      ->leftjoin('rooms','customers.room_no', '=', 'rooms.id')
      ->leftjoin('room_types','customers.room_type_id', '=', 'room_types.id')
      ->orderBy('customers.created_at', 'desc')
      ->get();
      return $sql; 
    }
}
