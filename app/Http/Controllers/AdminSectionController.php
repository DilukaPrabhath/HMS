<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\section;
use App\int_section;
use App\customer;

class AdminSectionController extends Controller
{
    public function index()
    {
        return view('backend.admin.section.add_section');
        
     }
     public function index2()
    {
        return view('backend.admin.customer.add_service');
        
     }

     public function store(Request $request)
    {
      

        $this->validate(request(), [

            'sectionname'       => 'required|unique:sections,section_name',
            'sectiondes'   => 'required',
            'sectionprice'   => 'required',
            'username'       => 'required',
            'offername'       => 'required',
            'image'       => 'required',
            ]);
    
    
             $section = new section;
    
             $section->section_name= $request->sectionname;
             $section->section_details= $request->sectiondes;
             $section->section_price= $request->sectionprice;
             $section->offer_id= $request->offername;
             $section->image= $request->image;
             $section->user_id= $request->username;
             

             if($request->hasfile('image')){
    
                    $file =$request->file('image');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/Sections/',$filename);
                    $section->image=$filename;

                    
                   }else{
                       echo 'hi';
                       $section->image = 'noimg.jpg';
                   }
        
                   $section->save();

        $notification = array(
           'message' => 'Section Add successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('admin/add/section')->with($notification);

     }
      public function view()
    {
        $data = section::Sectiondata();
        return view('backend.admin.section.view_section',compact('data'));
        
 
    }
    public function getCusdetails(Request $request)
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
        return redirect('admin/add/section/customer')->with($notification);
}
}
