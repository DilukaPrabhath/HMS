<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order_item;
use DB;
use Auth;
use App\user;
use App\order;

class ManagerOrderController extends Controller
{
    //View Orders

    public function orderpending(){
        $orders =Order_item::PendingOrderAdmin();
        return view('backend.manager.order.pending_order',compact('orders'));
     }
     public function ordercomplete(){
        $orders =Order_item::CompleteOrderAdmin();
        return view('backend.manager.order.complete_order',compact('orders'));
     }

        public function OrderFeedback($id){
        $feedback =Order_item::FeedbackOrderView($id);
        return view('backend.manager.order.feedback_order',compact('feedback'));
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

 public function fetchname(Request $request)
 {

      $data = User::where(['emp_no'=> $request->select])->get();
      if($data->isEmpty())
       {
         //return $nm = "Enter Valied Employee ID"; 
         
       }
    else
    {
       
        $fn =$data[0]->fname;
        $ln =$data[0]->lname;
        $var = "User Name : "; 
        return $nm = $var." ".$fn." ".$ln; 
    }
       
    }

     public function store(Request $request)
    {
      

        $this->validate(request(), [

            // 'type'       => 'required',
            // 'des'   => 'required',
            // 'image'       => 'required',
            // 'room_no'   => 'required',
    
            ]);

            $au = Auth::id();

            $feedback = $request->emp_no;
            $uid = user::select('id')->where('emp_no',$feedback)->get();
            $urid = $uid[0]->id;

            $feedback = new order;

            $feedback->role= $request->user_type_id;
            $feedback->emp_no= $request->emp_no;
            $feedback->user_id= $urid;
            $feedback->sender_id= $au;
            $feedback->message= $request->message;
            $feedback->order_id= $request->orderid;


            $feedback->save();

        $notification = array(
           'message' => 'Feedback Send successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('manager/pendingOrder')->with($notification);

     }
}
