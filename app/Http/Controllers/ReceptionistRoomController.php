<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
use App\customer;
use App\room_type;
use DB;

class ReceptionistRoomController extends Controller
{
    public function index()
    {
        $rooms = room::all();
        return view('backend.receptionist.room.index',compact('rooms'));
    }
     public function index1()
    {
        $rooms = customer::ReservedRoom();
        return view('backend.receptionist.room.reserved_room',compact('rooms'));
    }

    public function index2()
    {
        $rooms = customer::AvailableRoom();
        return view('backend.receptionist.room.available_rooms',compact('rooms'));
    }
     public function index3()
    {
        $rooms = customer::ReleaseRoom();
        return view('backend.receptionist.room.release_room',compact('rooms'));
    }

    
    public function create()
    {
        return view('backend.receptionist.room.create');
    }

    
    public function view()
    {
        $rooms = room::all();
        return view('backend.receptionist.room.view',compact('rooms'));
    }

    function fetchroom(Request $request)
{
    $select = $request->get('select');
    $value = $request->get('value');
    $dependent = $request->get('dependent');
    $data = DB::table('rooms')
    ->where($select,$value)
    ->where('status',1)
    ->groupBy($dependent)
    ->get();

    $output = '<option value=""> Select '.ucfirst($dependent).'</option>';
    foreach ($data as $row ) {
        $output .= '<option value=" '.$row->$dependent. ' ">'.$row->$dependent.'</option>';

    }
    echo $output;
}

    public function EditReservRoom($id)
    {
        $rooms = customer::ReleaseRoom($id);
        return view('backend.receptionist.room.release_room',compact('rooms'));
    }

   
    
    public function ChangeRoomUpdate(Request $request, $id)
    {

            $roomname = $request->room_no;
            $roomid = room::select('id')->where('room_no',$roomname)->get();
            $rid = $roomid[0]->id; //new room id

            $oldid = $request->oldroom;


            $customer = customer::find($id);
    
             $customer->room_type_id = $request->roomtype;
             $customer->room_no      =$rid;

             $customer->save();

            $id = $rid;
            $room = room::find($id);
            $room->status = 0;
            $room->save();

        
            $room = room::find($oldid);
            $room->status = 1;
            $room->save();


            

        $notification = array(
            'message' => 'Room Change successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('receptionist/customers')->with($notification);

    }
    

    public function destroy($id)
    {
        //
    }
}
