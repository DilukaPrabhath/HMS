<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room_facility;

class ManagerRoomFacilityController extends Controller
{
    public function index()
    {
        $roomfacilitie = room_facility::all();
        return view('backend.admin.room_facility.index',compact('roomfacilitie'));
    }
    
    public function create()
    {
        return view('backend.admin.room_facility.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [

            'facility'       => 'required',
            'icon'   => 'required',
    
            ]);
    
    
             $roomfacilitie = new room_facility;
    
             $roomfacilitie->facilities= $request->facility;
             $roomfacilitie->icon= $request->icon;
    
             

             if($request->hasfile('icon')){
    
                    $file =$request->file('icon');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/RoomFacility/',$filename);
                    $roomfacilitie->icon=$filename;

                    
                   }else{
                       echo 'hi';
                       $roomfacilitie->icon = 'noimg.jpg';
                   }
        
                   $roomfacilitie->save();

        $notification = array(
           'message' => 'Room Facility Add successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('admin/facility')->with($notification);

     }
    
    
    public function view($id)
    {
        $data = room_facility::find($id);
        $roomfacilitie = room_facility::all();
        return view('backend.admin.room_facility.view',compact('roomfacilitie','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = room_facility::find($id);
        $roomfacilitie = room_facility::all();
        return view('backend.admin.room_facility.edit',compact('roomfacilitie','data'));
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

            'facility'       => 'required',
            
            ]);

             $roomfacilitie = room_facility::find($id);
    
             $roomfacilitie->facilities = $request->facility;
             $roomfacilitie->icon       = $request->icon;
             

             if($request->hasfile('icon')){
    
                    $file = $request->file('icon');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('Upload/RoomFacility/',$filename);
                    $roomfacilitie->icon = $filename;

                   }else{
                       echo 'hi';
                       //$roomfacilitie->icon = 'noimg.jpg';
                   }
        
                   $roomfacilitie->save();

        $notification = array(
           'message' => 'Room Facility Update successfully!',
           'alert-type' => 'Success'
        );
        
        return redirect('admin/facility')->with($notification);
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
