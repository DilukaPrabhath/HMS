<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
use App\customer;
use App\room_type;
use DB;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = room::all();
        return view('backend.admin.room.index',compact('rooms'));
    }
     public function index1()
    {
        $rooms = customer::ReservedRoom();
        return view('backend.admin.room.reserved_room',compact('rooms'));
    }

    public function index2()
    {
        $rooms = customer::AvailableRoom();
        return view('backend.admin.room.available_rooms',compact('rooms'));
    }
     public function index3()
    {
        $rooms = customer::ReleaseRoom();
        return view('backend.admin.room.release_room',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.room.create');
    }

    
    public function store(Request $request)
    {
      

        $this->validate(request(), [

            'type'       => 'required',
            'des'   => 'required',
            'price'   => 'required',
            'image'       => 'required',
            'room_no'   => 'required|unique:rooms,room_no',
                ]);
    
    
             $rooms = new room;
    
             $rooms->room_type_id= $request->type;
             $rooms->price= $request->price;
             $rooms->description= $request->des;
             $rooms->facilities= $request->facility;
             $rooms->image= $request->image;
             $rooms->room_no= $request->room_no;
             

             if($request->hasfile('image')){
    
                    $file =$request->file('image');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/Rooms/',$filename);
                    $rooms->image=$filename;

                    
                   }else{
                       echo 'hi';
                       $rooms->icon = 'noimg.jpg';
                   }
        
                   $rooms->save();

        $notification = array(
           'message' => 'Room Add successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('admin/rooms')->with($notification);

     }
    public function view()
    {
        $rooms = room::all();
        return view('backend.admin.room.view',compact('rooms'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditReservRoom($id)
    {
        $rooms = customer::ReleaseRoom($id);
        return view('backend.admin.room.release_room',compact('rooms'));
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
        
        return redirect('admin/customers')->with($notification);

    }
    

    public function edit2($id)
    {
        $data = room::find($id);
        $room = room::all();
        return view('backend.admin.room.edit_room',compact('room','data'));
    }
    public function update(Request $request, $id)
    {
       $this->validate(request(), [

            'type'       => 'required',
            'des'   => 'required',
            'price'   => 'required',
            // 'image'       => 'required',
            'room_no'   => 'required',
    
            ]);
    
    
             $rooms = room::find($id);
             
             $rooms->price= $request->price;
             $rooms->description= $request->des;
             $rooms->facilities= $request->facility;
             $rooms->room_no= $request->room_no;
             

             if($request->hasfile('image')){
    
                    $file =$request->file('image');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/Rooms/',$filename);
                    $rooms->image=$filename;

                    
                   }else{
                       echo 'hi';
                       // $rooms->icon = 'noimg.jpg';
                   }
        
                   $rooms->save();

        $notification = array(
           'message' => 'Room Update successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('admin/rooms')->with($notification);
    }
}
