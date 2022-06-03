<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use App\customer;
use App\room;
use App\address;
use App\message;
use App\User;
use DB;

class ReceptionistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function create(){
        $customers  = customer::all();
        $address = DB::table('addresses')
        ->groupBy('province')
        ->get();
         return view('backend.receptionist.customer.create',compact('customers','address'));
     }

    function fetch(Request $request)
{
    //return "HI";
    $select = $request->get('select');
    $value = $request->get('value');
    $dependent = $request->get('dependent');
    $data = DB::table('addresses')
    ->where($select,$value)
    ->groupBy($dependent)
    ->get();

    $output = '<option value=""> Select '.ucfirst($dependent).'</option>';
    foreach ($data as $row ) {
        $output .= '<option value=" '.$row->$dependent. ' ">'.$row->$dependent.'</option>';

    }
    echo $output;
}
    public function store(Request $request)
    {
         $this->validate(request(), [

        
        'email'      => 'required|email|unique:users',
        'fname'       => 'required',
        'lname'    => 'required',
        'nic'    => 'required|min:10|max:10|unique:users',
        'line1'    => 'required',
        'line2'    => 'required',
        'line3'    => 'required',
        'city'    => 'required',
        'district'    => 'required',
        'province'    => 'required', 
        'country'    => 'required',
        'zip'     => 'required',
        'gender'     => 'required',
        'checkin'     => 'required',
        'checkout'     => 'required',
        'wifi'     => 'required',
        'room_no'     => 'required',
        'roomtype'     => 'required',
        'smoking'     => 'required',
        'guest'     => 'required',
        'mobile'     => 'required|min:10|max:10',
        
        ]);
          $roomname = $request->room_no;
          $roomid = room::select('id')->where('room_no',$roomname)->get();
          $rid = $roomid[0]->id;
         // return $request;

        $customer = new customer;
        $customer->fname=$request->fname;
        $customer->lname=$request->lname;
        $customer->line1=$request->line1;
        $customer->line2=$request->line2;
        $customer->line3=$request->line3;
        $customer->city=$request->city;
        $customer->district=$request->district;
        $customer->province=$request->province;
        $customer->country=$request->country;
        $customer->zipcode=$request->zip;
        $customer->nic=$request->nic;
        $customer->password=Hash::make($request->nic);
        $customer->mobile=$request->mobile;
        $customer->email=$request->email;
        $customer->gender=$request->gender;
        $customer->checkin=$request->checkin;
        $customer->checkout=$request->checkout;
        $customer->room_type_id=$request->roomtype;
        $customer->smoking=$request->smoking;
        $customer->wifi=$request->wifi;
        $customer->room_no=$rid;
        $customer->no_of_guest=$request->guest;
      
        $customer->save();

        $id = $rid;
        $room = room::find($id);
        $room->status = 0;
        $room->save();

        $notification = array(
            'message' => 'Customer Registration successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('receptionist/customers')->with($notification);
       
    }
    public function index()
    {
      $customers = customer::customerdata();
        return view('backend.receptionist.customer.index',compact('customers'));
        
     }
    

     public function view($id)
    {
        $data = customer::customerDataViewid($id);
        return view('backend.receptionist.customer.view',compact('data'));
        
 
    }
    public function edit($id)
    {
      $data = customer::customerDataEditid($id);
        return view('backend.receptionist.customer.edit',compact('data'));
    }

    public function update(Request $request ,$id)
    {
         $this->validate(request(), [

       'email'      => 'required',
        'fname'       => 'required',
        'lname'    => 'required',
        'nic'    => 'required|min:10|max:10|unique:users',
        'line1'    => 'required',
        'line2'    => 'required',
        'line3'    => 'required',
        'city'    => 'required',
        'district'    => 'required',
        'province'    => 'required', 
        'country'    => 'required',
        'zip'     => 'required',
        'gender'     => 'required',
        'checkin'     => 'required',
        'checkout'     => 'required',
        'status'     => 'required',
        'mobile'     => 'required|min:10|max:10',
        
        ]);
          
         $customer=customer::find($id);
        
        $customer->fname=$request->fname;
        $customer->lname=$request->lname;
        $customer->line1=$request->line1;
        $customer->line2=$request->line2;
        $customer->line3=$request->line3;
        $customer->city=$request->city;
        $customer->district=$request->district;
        $customer->province=$request->province;
        $customer->country=$request->country;
        $customer->zipcode=$request->zip;
        $customer->nic=$request->nic;
        $customer->mobile=$request->mobile;
        $customer->email=$request->email;
        $customer->gender=$request->gender;
        $customer->checkin=$request->checkin;
        $customer->checkout=$request->checkout;
        $customer->no_of_guest=$request->guest;
        $customer->status=$request->status;
      
        $customer->save();

       

        $notification = array(
            'message' => 'Customer Update successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('receptionist/customers')->with($notification);

    }

      function fetchfeedback(Request $request)
{
    $select = $request->get('select');
    $value = $request->get('value');
    $dependent = $request->get('dependent');

     // $data = user::with('userdetails')
   $data = DB::table('users')
    ->where($select,$value)
  
    ->get();

    $output = '<option value=""> Select '.ucfirst($dependent).'</option>';
    foreach ($data as $row ) {
        $output .= '<option value=" '.$row->$dependent. ' ">'.$row->$dependent.'</option>';

    }
    echo $output;
}

   public function empsearch(Request $request){
    $emp_no = $request->emp_no;
    $p = DB::table('users');
  
    return response()->json($p);

    }

    public function ChatList($id)
{

        // $x = $id; 
         $cid = $id;
         $chatlist = message::List($id);
         return view('backend.receptionist.messages.receptionist_message',compact('chatlist','cid'));
    }

     public function checkout($id)
    {
        $data = customer::Checkout($id);
         return view('backend.receptionist.customer.checkout',compact('data'));
     }

    public function updatecheckout(Request $request ,$id)
    {
        

        $oldid = $request->oldroom;
        $custid = $request->cid;

        $customer=customer::find($custid);
        $customer->checkout=$request->checkout;
        $customer->status   = 0;
        $customer->save();

        
        $room = room::find($oldid);
        $room->status = 1;
        $room->save();

        $notification = array(
            'message' => 'Customer CheckOut successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('receptionist/customers/checkinlist')->with($notification);

    }

     public function checkinlist()
    {
      $checkin = customer::CheckinList();
        return view('backend.receptionist.customer.checkin_list',compact('checkin'));
        
     }
      public function checkoutlist()
    {
      $checkout = customer::CheckoutList();
        return view('backend.receptionist.customer.checkout_list',compact('checkout'));
        
     }

}
