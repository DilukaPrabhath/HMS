<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\meal_items;
use DB;

class ManagerCategoryController extends Controller
{
    public function index(){
        
        return view('backend.manager.meals.category');
     }

     

     public function dinner()
    {
 
        $meal_items =meal_items::with('offername')->where('category', '=', "Dinner")->get();
        return view('backend.manager.meals.view_category',compact('meal_items'));

    }
     public function breakfast()
    {
 
        $meal_items =meal_items::with('offername')->where('category', '=',  "Breakfast")->get();
        return view('backend.manager.meals.view_category',compact('meal_items'));
    }
    public function lunch()
    {
 
        $meal_items =meal_items::with('offername')->where('category', '=',  "Lunch")->get();
        return view('backend.manager.meals.view_category',compact('meal_items'));

    }
    public function dessert()
    {
 
        $meal_items =meal_items::with('offername')->where('category', '=',  "Dessert")->get();
        return view('backend.manager.meals.view_category',compact('meal_items'));

    }
    public function drink()
    {
 
        $meal_items =meal_items::with('offername')->where('category', '=',  "Beverages")->get();
        return view('backend.manager.meals.view_category',compact('meal_items'));

    }
    public function snack()
    {
 
        $meal_items =meal_items::with('offername')->where('category', '=',  "Snack")->get();
        return view('backend.manager.meals.view_category',compact('meal_items'));

    }

}
