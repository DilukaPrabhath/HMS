<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use App\room_history;

class RoomHistroyExport implements FromCollection
{
    public function collection()
    {
        return room_history::all();
    }
}
