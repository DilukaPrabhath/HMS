<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class InactiveUserExport implements FromCollection
{
     
    public function collection()
    {
        $users = DB::table("users")
      ->select('users.*', 'user_types.user_type as type_name',)
      ->leftjoin('user_types','users.user_type_id', '=', 'user_types.id')
      ->where('users.status', '=' , 0)
      ->orderBy('users.created_at', 'desc')
      ->get();
      return $users; 
    }
}
