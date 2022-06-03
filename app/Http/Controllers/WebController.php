<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\meal_items;
use App\room;
class WebController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(){
   $meal_items = meal_items::all();
        return view('backend.website.index',compact('meal_items'));

     }

     public function index1(){
        return view('backend.website.recipe');

     }
      public function index2(){
        return view('backend.website.cart');

        //Rooms

     }
        public function index3(){
        $room_list = room::all();
        return view('backend.website.room',compact('room_list'));

     }

     //Recipe
     public function single()
    {
 
        $rooms =room::where('room_type_id', '=', "1")->get();
        return view('backend.website.room.room_list',compact('rooms'));

    }
     public function double()
    {
 
        $rooms =room::where('room_type_id', '=', "2")->get();
        return view('backend.website.room.room_list',compact('rooms'));
    }
    public function family()
    {
 
        $rooms =room::where('room_type_id', '=', "3")->get();
        return view('backend.website.room.room_list',compact('rooms'));

    }
    public function suite()
    {
 
        $rooms =room::where('room_type_id', '=', "4")->get();
        return view('backend.website.room.room_list',compact('rooms'));

    }
    public function doubleextra()
    {
 
        $rooms =room::where('room_type_id', '=', "5")->get();
        return view('backend.website.room.room_list',compact('rooms'));

    }
    
}
