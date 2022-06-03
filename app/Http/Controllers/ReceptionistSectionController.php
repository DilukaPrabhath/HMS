<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\section;
use App\int_section;
use App\customer;

class ReceptionistSectionController extends Controller
{
     public function index2()
    {
        return view('backend.receptionist.customer.add_service');
        
     }
     public function getCusdetails2(Request $request)
    {
  
    $cust = customer::where('nic',$request->select)->where('status',1)->first();
    if ($cust) {
        return $cust;
    }else{
        return $cust = 0;
    }
}
    public function storesection(Request $request)
    {
      
    
    $cust = customer::where('nic',$request->nic)->where('status',1)->first();
    $custid = $cust->id;

        $service = new int_section();
        $service->section_id    = $request->sectionname;
        $service->customer_id = $custid;
        $service->initiate_date = $request->date;
        $service->save();

    

         $notification = array(
           'message' => 'Service Add Successfully!',
            'alert-type' => 'Success'
        );
        return redirect('receptionist/add/section/customer')->with($notification);
}
}
