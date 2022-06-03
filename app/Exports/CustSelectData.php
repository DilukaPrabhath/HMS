<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustSelectData implements FromQuery,WithHeadings
{

    use Exportable;

        protected $from_date;
        protected $to_date;

        function __construct($from_date,$to_date) {
                $this->from_date = $from_date;
                $this->to_date = $to_date;
        }

        public function query()
        {
           $data = DB::table('customers')
           ->whereBetween('created_at', array($this->from_date, $this->to_date))
            // ->whereBetween('created_at',[ $this->from_date,$this->to_date])
            ->select('fname','lname','mobile','email','nic','created_at')->orderBy('created_at','asc');

            return $data; //
        }

        public function headings(): array
        {
            return [
                'First Name',
                'Last Name',
                'Mobile',
                'Email',
                'NIC',
                'Created_at',
            ];
        }
    }
