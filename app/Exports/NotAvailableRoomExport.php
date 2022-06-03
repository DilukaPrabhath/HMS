<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class NotAvailableRoomExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rooms = DB::table("rooms")
      ->select('rooms.*', 'room_types.room_type as type_name',)
      ->leftjoin('room_types','rooms.room_type_id', '=', 'room_types.id')
      ->where('rooms.status', '=' , 0)
        ->orderBy('rooms.created_at', 'desc')
      ->get();
      return $rooms;
    }
}
