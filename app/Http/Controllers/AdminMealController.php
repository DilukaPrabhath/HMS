<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\meal_items;

class AdminMealController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(){
        
        return view('backend.admin.meals.meal_items');
     }

     public function store(Request $request)
    {
      

        $this->validate(request(), [

            'itemname'       => 'required|unique:meal_items,item_name',
            'itemdes'   => 'required',
            'itemprice'   => 'required',
            'category'   => 'required',
            'offername'   => 'required',
            'icon'   => 'required',
    
            ]);
    
    
             $meals = new meal_items;
    
             $meals->item_name= $request->itemname;
             $meals->item_description= $request->itemdes;
             $meals->item_price= $request->itemprice;
             $meals->category= $request->category;
             $meals->offer_id= $request->offername;
             $meals->icon= $request->icon;
             $meals->status= 1;
    
             

             if($request->hasfile('icon')){

                   
                    $file =$request->file('icon');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/Meals/',$filename);
                    $meals->icon=$filename;

                    
                   }else{
                       echo 'hi';
                       $meals->icon = 'noimg.jpg';
                   }
        
                   $meals->save();

        $notification = array(
           'message' => 'Meal Add successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('admin/mealitems')->with($notification);

     }

     public function edit($id)
    {
       
        $data = meal_items::find($id);
       // $mealitems = meal_items::all();
        return view('backend.admin.meals.edit',compact('data'));
    }
    

    public function update(Request $request, $id)
    {
        $this->validate(request(), [

            // 'typename'       => 'required',
            // 'status'   => 'required',
    
            ]);
    
    
             $meals = meal_items::find($id);
    
             $meals->item_name= $request->itemname;
             $meals->item_description= $request->itemdes;
             $meals->item_price= $request->itemprice;
             $meals->category= $request->category;
             $meals->offer_id= $request->offername;
             $meals->status= $request->status;
    
             

             if($request->hasfile('icon')){
    
                    $file =$request->file('icon');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/Meals/',$filename);
                    $meals->icon=$filename;

                    
                   }else{
                       echo 'hi';
                       // $meals->icon = 'noimg.jpg';
                   }
        
                   $meals->save();

        $notification = array(
           'message' => 'Meal Update successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('admin/category')->with($notification);

    }
}
