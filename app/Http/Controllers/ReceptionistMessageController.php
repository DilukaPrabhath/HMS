<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;
use App\User;
use App\user_type;
use DB;
use Auth;
use App\message;

class ReceptionistMessageController extends Controller
{
    public function index(){
        $x= Auth::user()->id;
        $x2 = Auth::user()->id;
        $message = message::Getmsg2($x);
        // $message = message::all();
        return view('backend.receptionist.messages.receptionist_message',compact('message'));
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

            $msg = $request->emp_no;
            $uid = user::select('id')->where('emp_no',$msg)->get();
            $urid = $uid[0]->id;

            $msg = new message;

            $msg->role= $request->user_type_id;
            $msg->emp_no= $request->emp_no;
            $msg->subject= $request->subject;
            $msg->user_id= $urid;
            $msg->sender_id= $au;
            $msg->message= $request->message;
            $msg->save();

        $notification = array(
           'message' => 'Message Send Successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('receptionist/messages')->with($notification);

     }

        public function load_message2($id){
        $x = Auth::user()->id;

        $message = message::Getmsg2($x);
        $au = Auth::id();
        $chat = message::load_message($id,$au);


        // $chat = message::find($id);
        // $chat->msg_status = 1;
        // $chat->save();
        
        
       return view('backend.receptionist.messages.chat_list',compact('message','chat'));
     }

}
