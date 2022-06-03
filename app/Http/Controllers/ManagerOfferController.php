<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\offers;

class ManagerOfferController extends Controller
{
public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(){
        $offer = offers::all();
        return view('backend.manager.meals.item_offer',compact('offer'));
     }

    public function create()
    {
        return view('backend.manager.meals.item_offer');
        
    }
    public function store(Request $request)
    {
      

        $this->validate(request(), [

            'offername'       => 'required',
            'offerprice'   => 'required',
            'start'   => 'required',
            'end'   => 'required',
    
            ]);
    
    
             $offer = new offers;
    
             $offer->offer_name= $request->offername;
             $offer->offer_price= $request->offerprice;
             $offer->offer_type= $request->offertype;
             $offer->start_date= $request->start;
             $offer->end_date= $request->end;
             $offer->status= 1;
    
             
            
                   $offer->save();

        $notification = array(
           'message' => 'Offer Add successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('manager/offer')->with($notification);

     }

       public function view($id)
    {
        $data = offers::find($id);
        return view('backend.manager.meals.offer_edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
       $this->validate(request(), [

            'offername'       => 'required',
            'offerprice'   => 'required',
            'offertype'   => 'required',
            'start'   => 'required',
            'end'   => 'required',
            'status'   => 'required',
    
            ]);
    
    
             $offer = offers::find($id);
             
             $offer->offer_name= $request->offername;
             $offer->offer_price= $request->offerprice;
             $offer->offer_type= $request->offertype;
             $offer->start_date= $request->start;
             $offer->end_date= $request->end;
             $offer->status= $request->status;
             
        
                   $offer->save();

        $notification = array(
           'message' => 'Offer Update successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('manager/offer')->with($notification);
    }
}
