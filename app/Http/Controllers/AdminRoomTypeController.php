<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room_type;
class AdminRoomTypeController extends Controller
{
   
   
    public function create()
    {
        return view('backend.admin.room_type.create');
        
    }

    public function store(Request $request)
    {
      

        $this->validate(request(), [

            'typename'       => 'required|unique:room_types,room_type',
            'icon'   => 'required',
    
            ]);
    
    
             $roomtype = new room_type;
    
             $roomtype->room_type= $request->typename;
             $roomtype->icon= $request->icon;
             $roomtype->status= 1;
    
             

             if($request->hasfile('icon')){
    
                    $file =$request->file('icon');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/RoomTypes/',$filename);
                    $roomtype->icon=$filename;

                    
                   }else{
                       echo 'hi';
                       $roomtype->icon = 'noimg.jpg';
                   }
        
                   $roomtype->save();

        $notification = array(
           'message' => 'Room Type Add successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('admin/room_type')->with($notification);

     }
     public function index()
    {
        $roomtype = room_type::all();
        return view('backend.admin.room_type.index',compact('roomtype'));
    }

    
    public function view($id)
    {   
        $data = room_type::find($id);
        $roomtype = room_type::all();
        return view('backend.admin.room_type.view',compact('roomtype','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = room_type::find($id);
        $roomtype = room_type::all();
        return view('backend.admin.room_type.edit',compact('roomtype','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [

            'typename'       => 'required',
            'status'   => 'required',
    
            ]);
    
    
             $roomtype = room_type::find($id);
    
             $roomtype->room_type= $request->typename;
             $roomtype->icon= $request->icon;
             $roomtype->status= $request->status;
    
             

             if($request->hasfile('icon')){
    
                    $file =$request->file('icon');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/RoomTypes/',$filename);
                    $roomtype->icon=$filename;

                    
                   }else{
                       echo 'hi';
                    //    $roomtype->icon = 'noimg.jpg';
                   }
        
                   $roomtype->save();

        $notification = array(
           'message' => 'Room Type Update successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('admin/room_type')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
